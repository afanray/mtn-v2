<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;

class DashboardRoController extends Controller
{
    public function index(Request $request)
    {
        // Dummy data for dashboard
        $target = 1000;
        $achievement = 70; // Capaian target dalam persen
        $budgetUsed = 70; // Persen penyerapan anggaran

        $monthlyTargets = [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120];
        $monthlyBudgets = [5, 15, 25, 35, 45, 55, 65, 75, 85, 95, 105, 125];

        // Active menu
        $activeMenu = 'dashboardRo';

        $perPage = $request->get('perPage', 10); // Default to 10 records per page

        // Get the selected 'bidang' from the request (null if not set)
        $bidangFilter = $request->get('bidang', null);

        // Get all available Bidang options for the filter
        $bidang = [
            'riset_inovasi' => 'Riset dan Inovasi',
            'olahraga' => 'Olahraga',
            'seni_budaya' => 'Seni Budaya',
        ];

        // Build the query for fetching data with optional Bidang filter
        $query = Output::with('yearData');

        if ($bidangFilter) {
            // If a specific 'bidang' is selected, filter the results by the 'bidang'
            $query->where('bidang', $bidangFilter);
        }

        // Fetch the data with pagination
        $rencanaAksi = $query->paginate($perPage);

        // Fetch total counts for each 'bidang'
        $bidangCounts = Output::select('bidang')
            ->selectRaw('COUNT(*) as total_ro')
            ->selectRaw('COUNT(DISTINCT id) as total_rencana_aksi')
            ->groupBy('bidang')
            ->get()
            ->keyBy('bidang')
            ->toArray();

        // Fetch distinct years from the yearData relationship
        $years = $rencanaAksi->flatMap(function ($item) {
            return $item->yearData->pluck('tahun')->unique();
        })->sort()->values();

        // Prepare chart data
        $rencanaAksis = Output::with('yearData')->get();
        $chartData = [];

        foreach ($rencanaAksis as $item) {
            foreach ([2024, 2025, 2026, 2026, 2027] as $year) {
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

        $totalRO = Output::count();  // Assuming you have a model for RencanaAksi
        $roRisetInovasi = Output::where('bidang', 'riset-inovasi')->count();
        $roSeniBudaya = Output::where('bidang', 'seni-budaya')->count();
        $roOlahraga = Output::where('bidang', 'olahraga')->count();



        return view('rencana-aksi.index', compact(
            'target',
            'achievement',
            'budgetUsed',
            'monthlyTargets',
            'monthlyBudgets',
            'activeMenu',
            'rencanaAksi',
            'bidang',
            'bidangFilter',
            'years',
            'chartData',
            'bidangCounts',
            'totalRO',
            'roRisetInovasi',
            'roSeniBudaya',
            'roOlahraga'
        ));
    }
}
