<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\SinergiData;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SinergiResource;
use App\Models\Populations;
use Illuminate\Support\Facades\Auth;

class SinergiDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('master.sinergi-data.index',[
        'activeMenu'=>'master-sinergi-data'
      ]);
    }

  public function add()
  {
    $model = new SinergiData();
    return view('master.sinergi-data.form', [
      'activeMenu' => 'master-sinergi-data',
      'model' => $model,
    ]);
  }

 public function data(): JsonResponse
  {
    // @dd($bidangId);
    $user = Auth::user();
    $data = SinergiData::query()->with(['lembaga', 'lembaga_unit', 'lembaga_induk']);
    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cek apakah ini untuk update atau create
    $model = $request->input('id') ? SinergiData::find($request->input('id')) : new SinergiData();

    // Assign input ke model
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->produsen_data = $request->input('produsen_data');
    $model->jenis_data = $request->input('jenis_data');
    $model->satuan = $request->input('satuan');
    $model->base_url = $request->input('base_url');
    $model->key = $request->input('key');
    $model->method = $request->input('method');
    $model->parameter = $request->input('parameter');

    // Simpan model
    $model->save();

    // Redirect dengan pesan sukses
    $message = $request->input('id') ? 'Sunting' : 'Tambah';
    return redirect()->route('data-master.sinergi-data.index')->with('alert-success', $message . ' Data Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $model = SinergiData::find($id);
        $sinergi = new SinergiResource($model);
        return view('master.sinergi-data.show', [
        'activeMenu' => 'master-sinergi-data',
        'model' => $sinergi,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $model = SinergiData::find($id);
        return view('master.sinergi-data.form', [
        'activeMenu' => 'master-sinergi-data',
        'model' => $model,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SinergiData $sinergiData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(int $id)
    {
            $model = SinergiData::find($id);
            if (!$model) {
                    return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
                }
            $model->delete();
            return response()->json([]);
    }

}
