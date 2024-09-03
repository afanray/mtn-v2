<?php

namespace App\Http\Controllers\Api;

use App\Models\Talenta;
use App\Models\LevelTalenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Request\TalentaRequest;

class TalentaController extends Controller
{
  public function index(Request $request)
  {
    $talenta = Talenta::query()->with(['lembaga_induk', 'lembaga_unit', 'lembaga', 'bidang'])
      ->simplePaginate(30);
    return $talenta;
  }

  public function getLevelTalenta(Request $request)
  {
    $bidang_id = $request->input('bidang_id');
    return LevelTalenta::query()->when($request->input('bidang_id'), function ($query) use ($bidang_id) {
      return $query->where('bidang_id', $bidang_id);
    })->simplePaginate(30);
  }

  public function store(TalentaRequest $request)
  {
    $model = new Talenta();
    $model->nama_talenta = $request->input('nama_talenta');
    $model->nik = $request->input('nik');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->bidang_id = $request->input('bidang_id');
    $model->level_talenta_id = $request->input('level_talenta_id');
    if ($request->file('foto_talenta')) {
      $file = $request->file('foto_talenta');
      list($realName, $ext) = explode('.', $file->getClientOriginalName());
      $fileName = $realName . '_' . time() . random_int(1, 99) . '.' . $file->extension();
      $file->storeAs('public/talenta', $fileName);
      $model->foto_talenta = $fileName;
    }
    $model->save();
    return response()->json([
      'status' => 'success',
      'data' => $model
    ]);
  }

  function getCountTahapanBidang(Request $request)
  {

    $bidang = $request->get('_qb', "Riset dan Inovasi");

    // Mengambil jumlah talenta untuk setiap tahapan dalam satu query
    $tahapanCounts = DB::table('talenta')
      ->select('tahapan', DB::raw('count(*) as total'))
      ->where('bidang', $bidang)
      ->whereIn('tahapan', ['prabibit', 'bibit', 'potensi', 'unggul'])
      ->groupBy('tahapan')
      ->pluck('total', 'tahapan')
      ->toArray();

    // Daftar tahapan yang akan ditampilkan
    $tahapanList = ['prabibit', 'bibit', 'potensi', 'unggul'];

    // Menyiapkan data tahapan dengan memanfaatkan array_map
    $tahapan = array_map(function ($tahap) use ($tahapanCounts, $bidang) {
      return [
        'tahapan' => $tahap,
        'image' => $tahap . '_' . str_replace(' ', '', strtolower($bidang)) . ".svg",
        'total' => $tahapanCounts[$tahap] ?? 0 // Jika tidak ada hasil, gunakan 0
      ];
    }, $tahapanList);

    // Menyiapkan data bidang
    $data = [
      'bidang' => $bidang,
      'tahapan' => $tahapan
    ];
    return response()->json($data);
  }
}
