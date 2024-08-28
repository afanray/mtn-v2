<?php

namespace App\Http\Controllers;

use App\Models\AjangTalenta;
use App\Models\Bidang;
use App\Models\Lembaga;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class AjangTalentaController extends Controller
{
  public function index(): View
  {
    return view('ajang-talenta.index',[
      'activeMenu'=>'at'
    ]);
  }
  public function data(): JsonResponse{
    $data = AjangTalenta::query()->with(['lembaga','bidang']);
    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
  }

  public function add(): View {
    $bidang = Bidang::all();
    $model = new AjangTalenta();
    return view('ajang-talenta.form',[
      'activeMenu'=>'at',
      'model' => $model,
      'bidang'=>$bidang,
    ]);
  }

  public function edit(int $id): View {
    $model = AjangTalenta::find($id);
    return view('ajang-talenta.form',[
      'activeMenu'=>'at',
      'model' => $model,
    ]);
  }

  /**
   * @throws \Exception
   */
  public function store(Request $request): RedirectResponse {
    $model = new AjangTalenta();
    if($request->input('id')){
      $model = AjangTalenta::find($request->input('id'));
    }
    $model->nama_ajang = $request->input('nama_ajang');
    $model->tgl_mulai = $request->input('tgl_mulai');
    $model->tgl_selesai = $request->input('tgl_selesai');
    $model->desc = $request->input('desc');
    $model->link_web = $request->input('link_web');
    $model->bidang_id = $request->input('bidang_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->tingkat_rekognisi = $request->input('tingkat_rekognisi');
    if ($request->file('foto')){
      $file = $request->file('foto');
      list($realName,$ext) = explode('.',$file->getClientOriginalName());
      $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
      $file->storeAs('public/ajang_talenta', $fileName);
      $model->foto = $fileName;
    }
    $model->save();
    return redirect()->route('ajang-talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
  }

  public function delete(int $id): JsonResponse {
    $model = AjangTalenta::find($id);
    $model->delete();
    return response()->json([]);
  }
}
