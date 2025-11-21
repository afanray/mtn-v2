<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\Bidang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\CapaianTargetIndikator;
use App\Models\Indikator;

class SasaranIndikatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('master.sasaran-indikator.index', [
            'activeMenu' => 'master-sasaran-indikator'
        ]);
    }

    public function data(): JsonResponse
    {
        // @dd($bidangId);
        $user = Auth::user();
        $data = CapaianTargetIndikator::query()->with(['indikator', 'indikator.sasaran', 'indikator.sasaran.bidang']);
        $dataTable = DataTables::of($data)->toJson();

        return response()->json($dataTable->getData());
    }


    public function data_dashboard(Request $request): JsonResponse
    {
        $tahun = $request->tahun;

        $data = CapaianTargetIndikator::with([
            'indikator.sasaran.bidang'
        ]);

        // Filter tahun jika ada
        if (!empty($tahun)) {
            $data->where('year', $tahun);
        }

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }

    public function add()
    {
        $indikator = Indikator::all();
        $model = new CapaianTargetIndikator();
        return view('master.sasaran-indikator.form', [
            'activeMenu' => 'master-sasaran-indikator',
            'model' => $model,
            'indikator' => $indikator,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $model = new CapaianTargetIndikator();
        if ($request->input('id')) {
            $model = CapaianTargetIndikator::find($request->input('id'));
        }
        $model->indikator_id = $request->input('indikator_id');
        $model->year = $request->input('year');
        $model->target = $request->input('target');
        $model->capaian = $request->input('capaian');
        $model->save();
        return redirect()->route('data-master.sasaran-indikator.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('master.sasaran-indikator.dashboard.index', [
            'activeMenu' => 'dashboard-sasaran-indikator'
        ]);
    }



    public function edit(int $id)
    {

        $indikator = Indikator::all();
        $model = new CapaianTargetIndikator();

        $model = CapaianTargetIndikator::with(['indikator', 'indikator.sasaran', 'indikator.sasaran.bidang'])->findOrFail($id);
        return view('master.sasaran-indikator.form', [
            'activeMenu' => 'master-sasaran-indikator',
            'model' => $model,
            'indikator' => $indikator,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $model = CapaianTargetIndikator::find($id);
        if (!$model) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $model->delete();
        return response()->json([]);
    }
}
