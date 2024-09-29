<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\Bidang;
use App\Models\Talenta;
use Illuminate\Http\Request;
use App\Models\HighLightTalenta;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\TalentaResource;
use App\Models\TalentaPrestasi;
use Yajra\DataTables\Facades\DataTables;

class DataTalentaController extends Controller
{
  public function index()
  {
    return view('master.talenta.index', [
      'activeMenu' => 'master-talenta'
    ]);
  }

  public function data(): JsonResponse
  
  {
    $user = Auth::user();
    $data = Talenta::query()
             ->with(['lembaga', 'bidang', 'level_talenta', 'lembaga_unit', 'lembaga_induk']);
          // Jika user bukan superadmin, tambahkan filter berdasarkan lembaga_id
              if ($user->role !== 'superadmin') {
                  $data->where('lembaga_id', '=', $user->lembaga_id);
              }
    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
  }

  public function add()
  {
    $bidang = Bidang::all();
    $model = new Talenta();
    return view('master.talenta.form', [
      'activeMenu' => 'master-talenta',
      'model' => $model,
      'bidang' => $bidang,
    ]);
  }

  public function edit(int $id)
  {
    $bidang = Bidang::all();
    $model = Talenta::find($id);

    return view('master.talenta.form', [
      'activeMenu' => 'master-talenta',
      'model' => $model,
      'bidang' => $bidang,
    ]);
  }


  public function show(int $id)
  {
    // $bidang = Bidang::all();
    $model = Talenta::find($id);
    $talenta = new TalentaResource($model);
    return view('master.talenta.show', [
      'activeMenu' => 'master-talenta',
      'model' => $talenta,
    ]);
  }

  
  public function store(Request $request): RedirectResponse
  {
    $model = new Talenta();
    if ($request->input('id')) {
      $model = Talenta::find($request->input('id'));
    }
    $model->nama_talenta = $request->input('nama_talenta');
    $model->nik = $request->input('nik');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->bidang_id = $request->input('bidang_id');
    $model->level_talenta_id = $request->input('level_talenta_id');
    $model->province_id = $request->input('province_id');
    $model->regency_id = $request->input('regency_id');

    if ($request->file('foto_talenta')) {
      $file = $request->file('foto_talenta');
      list($realName, $ext) = explode('.', $file->getClientOriginalName());
      $fileName = $realName . '_' . time() . random_int(1, 99) . '.' . $file->extension();
      $file->storeAs('public/talenta', $fileName);
      $model->foto_talenta = $fileName;
    }
    $model->save();
    return redirect()->route('data-master.talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
  }

  public function prestasiAdd($id)
      {
      // $talentaId = $request->get('id');
        // @dd($id );
        $bidang = Bidang::all();
        $model = Talenta::find($id);
        $talenta = new TalentaResource($model);
        return view('master.talenta.prestasi-form', [
          'activeMenu' => 'master-talenta-tambah-prestasi',
          'model' => $talenta,
          'bidang' => $bidang,
        ]);
      }

  public function prestasiStore(Request $request, $id): RedirectResponse
  {
  // @dd($request->all());
    $model = new TalentaPrestasi();
    // if ($request->input('id')) {
    //   $model = Talenta::find($request->input('id'));
    // }
    $model->talenta_id = $id;
    $model->nama_prestasi = $request->input('nama_prestasi');
    $model->deskripsi = $request->input('deskripsi');
    $model->bidang_id = $request->input('bidang_id');
    $model->sub_bidang = $request->input('subbidang');
    $model->tanggal_perolehan = $request->input('tanggal_perolehan');
    $model->penyelenggara = $request->input('penyelenggara');
    $model->tingkat_rekognisi = $request->input('tingkat_rekognisi');
    $model->prestasi = $request->input('prestasi');
    $model->link_web = $request->input('link_web');

    $model->save();
    return redirect()->route('data-master.talenta.index')->with('alert-success', 'Tambah Data Berhasil');
  }

  public function delete(int $id): JsonResponse
  {
    $model = Talenta::find($id);
    HighLightTalenta::query()->where('talenta_id', $id)->delete();
    TalentaPrestasi::query()->where('talenta_id', $id)->delete();
    $model->delete();

    return response()->json([]);
  }
}
