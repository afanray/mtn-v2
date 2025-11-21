<?php

namespace App\Http\Controllers;

use App\Imports\DynamicYearImport;
use App\Models\LogRencanaAksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Output;
use App\Models\Bidang;
use Yajra\DataTables\Facades\DataTables;
use App\Models\OutputYearData;

class ImportController extends Controller
{

    public function showImportForm(Request $request)
    {
        // Get the 'perPage' parameter from the request or set a default
        $perPage = $request->get('perPage', 10); // Default to 10 records per page

        // Get the selected 'bidang', 'tahun' (year), and 'rencana_aksi_id' from the request (null if not set)
        $bidangFilter = $request->get('bidang', null);
        $tahunFilter = $request->get('tahun', null);
        $rencanaAksiIdFilter = $request->get('rencana_aksi_id', null);

        // Get all available Bidang options for the filter
        $bidang = [
            'riset_inovasi' => 'Riset dan Inovasi',
            'olahraga' => 'Olahraga',
            'seni_budaya' => 'Seni Budaya',
        ];

        // Build the query for fetching data with optional filters
        $query = Output::with('yearData');

        // Apply the 'bidang' filter if it's set
        if ($bidangFilter) {
            $query->where('bidang', $bidangFilter);
        }

        // Apply the 'tahun' (year) filter if it's set
        if ($tahunFilter) {
            $query->whereHas('yearData', function ($query) use ($tahunFilter) {
                $query->where('tahun', $tahunFilter);
            });
        }

        // Apply the 'rencana_aksi_id' filter if it's set
        if ($rencanaAksiIdFilter) {
            $query->where('id', $rencanaAksiIdFilter);
        }

        // Fetch the data with pagination, applying the filters if set
        $rencanaAksi = $query->paginate($perPage);

        // Fetch distinct years from the yearData relationship
        $years = $rencanaAksi->flatMap(function ($item) {
            return $item->yearData->pluck('tahun')->unique();
        })->sort()->values();

        // Fetch all data for chart generation
        $tahunFilter = $request->input('tahun', null);
        $rencanaAksiIdFilter = $request->input('rencana_aksi_id', null);

        // Query Output model with year data relationship
        $rencanaAksis = Output::with([
            'yearData' => function ($query) use ($tahunFilter) {
                if ($tahunFilter) {
                    $query->where('tahun', $tahunFilter);
                }
            }
        ])
            ->when($rencanaAksiIdFilter, function ($query) use ($rencanaAksiIdFilter) {
                return $query->where('id', $rencanaAksiIdFilter);
            })
            ->get();

        // Extract data from the first rencanaAksi for display (adjust if needed)
        $rencanaAksi = $rencanaAksis->first();
        $yearData = $rencanaAksi ? $rencanaAksi->yearData->first() : null;

        // Example static data (can be replaced with actual year data)
        $target = $yearData ? $yearData->target : 1000;
        $budget = $yearData ? $yearData->alokasi_anggaran : 1000000000;
        $targetAchievement = ($yearData && $target > 0)
            ? ($yearData->capaian / $target) * 100
            : 0; // Default to 0% if target is zero or not set
        $budgetAbsorption = ($yearData && $budget > 0)
            ? ($yearData->realisasi_anggaran / $budget) * 100
            : 0; // Default to 0% if budget is zero or not set


        // Fetch monthly data for LogRencanaAksi
        $monthlyTargetData = LogRencanaAksi::selectRaw('MONTH(created_at) as month, SUM(target) as total_target')
            ->where('type', 1) // Type 1 for target
            ->when($tahunFilter, function ($query) use ($tahunFilter) {
                $query->whereYear('created_at', $tahunFilter);
            })
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_target', 'month')
            ->toArray();

        $monthlyBudgetData = LogRencanaAksi::selectRaw('MONTH(created_at) as month, SUM(realisasi_anggaran) as total_budget')
            ->where('type', 2) // Type 2 for budget
            ->when($tahunFilter, function ($query) use ($tahunFilter) {
                $query->whereYear('created_at', $tahunFilter);
            })
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total_budget', 'month')
            ->toArray();

        // Fill missing months with 0 for charting
        $allMonths = range(1, 12);
        $monthlyTargetData = array_map(function ($value) {
            return is_numeric($value) ? (float) $value : 0;
        }, $monthlyTargetData);

        $monthlyBudgetData = array_map(function ($value) {
            return is_numeric($value) ? (float) $value : 0;
        }, $monthlyBudgetData);
        $monthlyTargetData = array_replace(array_fill_keys($allMonths, 0), $monthlyTargetData);
        $monthlyBudgetData = array_replace(array_fill_keys($allMonths, 0), $monthlyBudgetData);

        // Convert data to arrays for Highcharts
        $monthlyTargetData = array_values($monthlyTargetData);
        $monthlyBudgetData = array_values($monthlyBudgetData);

        $yearlyAchievementData = [50, 60, 70, 80, 90, 100];

        $kementerianLembaga = $rencanaAksi->kementerian_lembaga ?? 'Badan Riset dan Inovasi Nasional';
        $arahKebijakan = $rencanaAksi->arah_kebijakan ?? 'AK 2. Memperkuat intervensi pembinaan serta fasilitasi Talenta';
        $fokusPelaksanaan = $rencanaAksi->fokus_pelaksanaan ?? 'FP 2.4.2 fasilitasi platform kolaborasi Talenta Riset dan Inovasi';
        $tantanganPelaksanaan = $yearData->tantangan_pelaksanaan ?? 'Dimulai tahun 2023, terdapat kebijakan pemberian bantuan Beasiswa S3 Dosen melalui jalur LPDP...';
        $strategiTerobosan = $rencanaAksi->strategi_terobosan ?? 'ST 2.4 Memperkuat kolaborasi SDM Iptek';




        // Prepare the chart data
        $chartData = [];

        foreach ($rencanaAksis as $item) {
            foreach (range(2024, 2029) as $year) {
                $yearData = $item->yearData->where('tahun', $year)->first();

                $chartData[] = [
                    'kode_ro' => $item->kode_ro,
                    'tahun' => $year,
                    'target' => $yearData->target ?? 0,
                    'capaian' => $yearData->capaian ?? 0,
                    'alokasi_anggaran' => $yearData->alokasi_anggaran ?? 0,
                    'realisasi_anggaran' => $yearData->realisasi_anggaran ?? 0,
                ];
            }
        }

        $chartDataYears = [];

        $chartDataYears = [];


        $outputYearData = OutputYearData::where('rencana_aksi_id', $rencanaAksiIdFilter)
            ->whereBetween('tahun', [2024, 2029]) // Filters for years between 2024 and 2029
            ->get();


        foreach ($outputYearData as $data) {
            $chartDataYears[] = [
                'tahun' => $data->tahun,
                'target' => $data->target ?? 0,
                'capaian' => $data->capaian ?? 0,
                'alokasi_anggaran' => $data->alokasi_anggaran ?? 0,
                'realisasi_anggaran' => $data->realisasi_anggaran ?? 0,
            ];
        }


        // Return the view with the filtered data, chart data, and available filters
        return view('rencana-aksi.import', compact(
            'rencanaAksis',
            'bidang',
            'bidangFilter',
            'years',
            'chartData',
            'tahunFilter',
            'rencanaAksiIdFilter',
            'target',
            'budget',
            'targetAchievement',
            'budgetAbsorption',
            'monthlyTargetData',
            'monthlyBudgetData',
            'yearlyAchievementData',
            'kementerianLembaga',
            'arahKebijakan',
            'fokusPelaksanaan',
            'tantanganPelaksanaan',
            'strategiTerobosan',
            'chartDataYears',
        ))->with('activeMenu', 'rencanaAksi');
    }

    public function create()
    {
        return view('rencana-aksi.rencana_aksi_create', [
            'activeMenu' => 'tambah-import',
        ]);
    }


    public function keahlianAdd()
    {

        return view('rencana-aksi.import', compact('rencanaAksi'))->with('activeMenu', 'rencanaAksi');
    }


    // public function showImportForm(Request $request)
    // {  
    //     // Data Dummy
    //     $target = 1000;
    //     $achievement = 70; // Capaian target dalam persen
    //     $budgetUsed = 70; // Persen penyerapan anggaran

    //     $monthlyTargets = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120];
    //     $monthlyBudgets = [5, 15, 25, 35, 45, 55, 65, 75, 85, 95, 105, 125];

    //     // Variabel aktif menu tambahan
    //     $activeMenu = 'dashboardRo';

    //     $perPage = $request->get('perPage', 10); // Default to 10 records per page

    //     // Get the selected 'bidang' from the request (null if not set)
    //     $bidangFilter = $request->get('bidang', null);

    //     // Get all available Bidang options for the filter
    //     $bidang = [
    //         'riset_inovasi' => 'Riset dan Inovasi',
    //         'olahraga' => 'Olahraga',
    //         'seni_budaya' => 'Seni Budaya',
    //     ];

    //     // Build the query for fetching data with optional Bidang filter
    //     $query = Output::with('yearData');

    //     if ($bidangFilter) {
    //         // If a specific 'bidang' is selected, filter the results by the 'bidang'
    //         $query->where('bidang', $bidangFilter);
    //     }

    //     // Fetch the data with pagination, applying the filter if set
    //     $rencanaAksi = $query->paginate($perPage);

    //     // Fetch distinct years from the yearData relationship
    //     $years = $rencanaAksi->flatMap(function ($item) {
    //         return $item->yearData->pluck('tahun')->unique();
    //     })->sort()->values();

    //     $rencanaAksis = Output::with('yearData')->get();

    //     // Prepare the chart data
    //     $chartData = [];

    //     foreach ($rencanaAksis as $item) {
    //         foreach ([2024, 2025, 2026, 2026, 2027] as $year) {
    //             $yearData = $item->yearData->where('tahun', $year)->first();

    //             $chartData[] = [
    //                 'kode_ro' => $item->kode_ro,
    //                 'tahun' => $year,
    //                 'target' => $yearData->target ?? 0,
    //                 'capaian' => $yearData->capaian ?? 0,
    //                 'alokasi_anggaran' => $yearData->alokasi_anggaran ?? 0,
    //                 'realisasi_anggaran' => $yearData->realisasi_anggaran ?? 0,
    //             ];
    //         }
    //     }

    //     return view('import', compact('target', 'achievement', 'budgetUsed', 'monthlyTargets', 'monthlyBudgets', 'activeMenu', 'rencanaAksi', 'bidang', 'bidangFilter', 'years', 'chartData'));
    // }

    public function showChart(Request $request)
    {
        // Retrieve data from the database, including the associated yearData
        $rencanaAksi = Output::with('yearData')->get();

        // Prepare the chart data
        $chartData = [];

        foreach ($rencanaAksi as $item) {
            foreach ([2024, 2025, 2026] as $year) {
                $yearData = $item->yearData->where('tahun', $year)->first();

                $chartData[] = [
                    'kode_ro' => $item->kode_ro,
                    'tahun' => $year,
                    'target' => $yearData->target ?? 0,
                    'capaian' => $yearData->capaian ?? 0,
                    'alokasi_anggaran' => $yearData->alokasi_anggaran ?? 0,
                    'realisasi_anggaran' => $yearData->realisasi_anggaran ?? 0,
                ];
            }
        }

        // Define the active menu item
        $activeMenu = 'chart';

        // Pass data to the view
        return view('rencana-aksi.chart', compact('chartData', 'activeMenu'));
    }




    public function store(Request $request)
    {
        $request->validate([
            'kode_ro' => 'required|string|max:255',
            'strategi_terobosan' => 'required|string|max:255',
            'kementerian_lembaga' => 'required|string|max:255',
            'tahun' => 'array',
            'tahun.*' => 'required|numeric',
            'target' => 'array',
            'target.*' => 'nullable|numeric',
            'capaian' => 'array',
            'capaian.*' => 'nullable|numeric',
            'alokasi_anggaran' => 'array',
            'alokasi_anggaran.*' => 'nullable|numeric',
            'realisasi_anggaran' => 'array',
            'realisasi_anggaran.*' => 'nullable|numeric',
            'arah_kebijakan' => 'nullable|string',
            'fokus_pelaksanaan' => 'nullable|string',
        ]);

        // Create the main Output record with sasaran_outcome included
        $output = Output::create([
            'kode_ro' => $request->input('kode_ro'),
            'rincian_output' => $request->input('rincian_output'),
            'kementerian_lembaga' => $request->input('kementerian_lembaga'),
            'arah_kebijakan' => $request->input('arah_kebijakan', ''), // Set default to empty string if null
            'fokus_pelaksanaan' => $request->input('fokus_pelaksanaan', ''), // Set default to empty string if null
            'strategi_terobosan' => $request->input('strategi_terobosan', ''), // Set default to empty string if null
            'bidang' => $request->input('bidang'),
            'operator' => Auth::user()->username // Set default to empty string if null
        ]);

        // Loop through the dynamic fields to create OutputYearData records
        foreach ($request->input('tahun', []) as $index => $tahun) {
            OutputYearData::create([
                'tahun' => $tahun,
                'target' => $request->input('target')[$index] ?? null,
                'capaian' => $request->input('capaian')[$index] ?? null,
                'alokasi_anggaran' => $request->input('alokasi_anggaran')[$index] ?? null,
                'realisasi_anggaran' => $request->input('realisasi_anggaran')[$index] ?? null,
                'rencana_aksi_id' => $output->id, // Link the year data to the output record
                'tantangan_pelaksanaan' => $request->input('tantangan_pelaksanaan', '')[$index] ?? nul,
                'strategi_pelaksanaan' => $request->input('strategi_pelaksanaan', '')[$index] ?? nul,
                'status_pelaksanaan' => $request->input('status_pelaksanaan', 'Aktif')[$index] ?? nul,
            ]);
        }

        return redirect()->back()->with('success', 'Data insert successfully');
    }
    public function createDetail($rencanaAksiId)
    {
        $rencanaAksi = Output::findOrFail($rencanaAksiId);
        return view('rencana_aksi_detail.create', compact('rencanaAksi'));
    }

    public function storeDetail(Request $request, $rencanaAksiId)
    {
        $request->validate([
            'tahun' => 'required|numeric',
            'target' => 'nullable|numeric',
            'capaian' => 'nullable|numeric',
            'alokasi_anggaran' => 'nullable|numeric',
            'realisasi_anggaran' => 'nullable|numeric',
            'tantangan_pelaksanaan' => 'nullable|string',
            'strategi_pelaksanaan' => 'nullable|string',
            'status_pelaksanaan' => 'required|string',
        ]);

        // Check if a record with the given year and rencana_aksi_id already exists
        $outputYearData = OutputYearData::where('rencana_aksi_id', $rencanaAksiId)
            ->where('tahun', $request->input('tahun'))
            ->first();

        if ($outputYearData) {
            // Update the existing record
            $outputYearData->update([
                'target' => $outputYearData->target + $request->input('target', 0),
                'capaian' => $outputYearData->capaian + $request->input('capaian', 0),
                'alokasi_anggaran' => $outputYearData->alokasi_anggaran + $request->input('alokasi_anggaran', 0),
                'realisasi_anggaran' => $outputYearData->realisasi_anggaran + $request->input('realisasi_anggaran', 0),
                'tantangan_pelaksanaan' => $request->input('tantangan_pelaksanaan', $outputYearData->tantangan_pelaksanaan),
                'strategi_pelaksanaan' => $request->input('strategi_pelaksanaan', $outputYearData->strategi_pelaksanaan),
                'status_pelaksanaan' => $request->input('status_pelaksanaan') ?: $outputYearData->status_pelaksanaan,
            ]);
        } else {
            // Create a new record
            OutputYearData::create([
                'rencana_aksi_id' => $rencanaAksiId,
                'tahun' => $request->input('tahun'),
                'target' => $request->input('target'),
                'capaian' => $request->input('capaian'),
                'alokasi_anggaran' => $request->input('alokasi_anggaran'),
                'realisasi_anggaran' => $request->input('realisasi_anggaran'),
                'tantangan_pelaksanaan' => $request->input('tantangan_pelaksanaan'),
                'strategi_pelaksanaan' => $request->input('strategi_pelaksanaan'),
                'status_pelaksanaan' => $request->input('status_pelaksanaan'),
            ]);
        }

        // Check for realisasi_anggaran and/or capaian to create LogRencanaAksi
        if ($request->filled('realisasi_anggaran')) {
            LogRencanaAksi::create([
                'rencana_aksi_id' => $rencanaAksiId,
                'tahun' => $request->input('tahun'),
                'type' => '2', // Type 1 for realisasi_anggaran
                'tantangan_pelaksanaan' => $request->input('tantangan_pelaksanaan'),
                'target' => $request->input('capaian'),
                'strategi_pelaksanaan' => $request->input('strategi_pelaksanaan'),
                'status_pelaksanaan' => $request->input('status_pelaksanaan'),
                'created_by' => auth()->id(),
            ]);
        }

        if ($request->filled('capaian')) {
            LogRencanaAksi::create([
                'rencana_aksi_id' => $rencanaAksiId,
                'tahun' => $request->input('tahun'),
                'type' => '1', // Type 2 for capaian
                'tantangan_pelaksanaan' => $request->input('tantangan_pelaksanaan'),
                'realisasi_anggaran' => $request->input('realisasi_anggaran'),
                'strategi_pelaksanaan' => $request->input('strategi_pelaksanaan'),
                'status_pelaksanaan' => $request->input('status_pelaksanaan'),
                'created_by' => auth()->id(),
            ]);
        }

        return redirect()->back()->with('success', 'Data capaian berhasil disimpan.');
    }



    public function fetchImports()
    {
        try {
            $rencanaAksi = Output::query();

            return DataTables::of($rencanaAksi)
                ->addColumn('aksi', function ($row) {
                    return '<button id="' . $row->id . '" class="delete-row btn btn-danger btn-sm">Hapus</button>';
                })
                ->rawColumns(['aksi']) // Enable HTML rendering for the 'aksi' column
                ->make(true);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching data: ' . $e->getMessage()], 500);
        }
    }

    public function data(): JsonResponse
    {
        $data = $rencanaAksi = Output::all();
        $dataTable = DataTables::of($data)->toJson();
        return response()->json($dataTable->getData());
    }

    public function destroy($id)
    {
        try {
            $output = Output::findOrFail($id);
            $output->delete();

            // Redirect back to the import view with a success message
            return redirect()->back()->with('alert-success', 'Hapus Data Berhasil');
        } catch (\Exception $e) {
            // Redirect back to the import view with an error message
            return redirect()->back()->with('error', 'Data gagal dihapus: ' . $e->getMessage());
        }
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls',
            'bidang' => 'required'
        ]);

        Excel::import(new DynamicYearImport($request->input('bidang')), $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully');
    }
    public function updateRencanaAksiField(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|integer', // ID of the main Rencana Aksi
            'year' => 'required|integer', // Year of the data to update
            'field' => 'required|string', // Field to update (e.g., "capaian" or "realisasi_anggaran")
            'value' => 'required|string', // New value for the field
        ]);

        // Extract validated data
        $id = $validated['id'];
        $year = $validated['year'];
        $field = $validated['field'];
        $value = $validated['value'];

        // Fetch the specific year data
        $yearData = OutputYearData::where('rencana_aksi_id', $id)->where('tahun', $year)->first();

        if (!$yearData) {
            return response()->json(['success' => false, 'message' => 'Year data not found.']);
        }

        // Update the field dynamically and save
        $yearData->$field = $value;
        $yearData->save();

        return redirect()->back()->with('success', 'Data Updated successfully');
    }
}
