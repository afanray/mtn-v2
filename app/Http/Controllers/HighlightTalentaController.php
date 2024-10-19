<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\Lembaga;
use App\Models\Talenta;
use App\Models\RefPrizes;
use Illuminate\View\View;
use App\Models\BidangFokus;
use Illuminate\Http\Request;
use App\Models\HighLightTalenta;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class HighlightTalentaController extends Controller
{
  public function index(): View
  {
    return view('highlight-talenta.index', [
      'activeMenu' => 'ht'
    ]);
  }
  public function data(): JsonResponse
  {
    $user = Auth::user();
    $data = HighLightTalenta::query()
              ->with(['lembaga', 'talenta', 'bidang', 'prizes']);
            if ($user->role !== 'superadmin') {
                  $data->where('created_by', '=', $user->id);
              };

    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
  }

  public function add(): View
  {
    $bidang = Bidang::all();        
    $ref_prizes = RefPrizes::all();
    $model = new HighLightTalenta();
    return view('highlight-talenta.form', [
      'activeMenu' => 'ht',
      'model' => $model,
      'bidang' => $bidang,
      // 'talenta' => $talenta,
      'ref_prizes' => $ref_prizes,
    ]);
  }

  public function edit(int $id): View
  {
    $bidang = Bidang::all();
    $talenta = DB::table('talenta')
          ->where('bidang_id', 1)
          ->get();  
    $ref_prizes = RefPrizes::all();
    $model = HighLightTalenta::find($id);
    return view('highlight-talenta.form', [
      'activeMenu' => 'ht',
      'model' => $model,
      'bidang' => $bidang,
      // 'bidang_fokus' => $bidangFokus,
      'talenta' => $talenta,
      'ref_prizes' => $ref_prizes,
    ]);
  }

  /**
   * @throws \Exception
   */
  public function store(Request $request): RedirectResponse
{
    // Cek apakah ini untuk update atau create
    $model = $request->input('id') ? HighLightTalenta::find($request->input('id')) : new HighLightTalenta();

    // Assign input ke model
    $model->talenta_id = $request->input('talenta_id');
    $model->ref_prizes_id = $request->input('ref_prizes_id');
    $model->desc_penghargaan = $request->input('desc_penghargaan');
    $model->link_web = $request->input('link_web');
    $model->bidang_id = $request->input('bidang_id');
    $model->bidang_fokus_id = $request->input('bidang_fokus_id');
    $model->tahun = $request->input('tahun');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');

    // Jika ada file foto_penghargaan baru
    if ($request->file('foto_penghargaan')) {
        // Hapus file lama jika ada
        if ($model->foto_penghargaan && Storage::exists('public/penghargaan/' . $model->foto_penghargaan)) {
            Storage::delete('public/penghargaan/' . $model->foto_penghargaan);
        }

        // Simpan file baru
        $fileName = $request->file('foto_penghargaan')->store('public/penghargaan');
        $model->foto_penghargaan = basename($fileName);
    }

    // Set updated_by jika update
    if ($request->input('id')) {
        $model->updated_by = auth()->user()->id;
    }

    // Simpan model
    $model->save();

    // Redirect dengan pesan sukses
    $message = $request->input('id') ? 'Sunting' : 'Tambah';
    return redirect()->route('highlight-talenta.index')->with('alert-success', $message . ' Data Berhasil');
}

  

public function delete(int $id): JsonResponse
  {
    $model = HighLightTalenta::find($id);
    if (!$model) {
              return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
          }
    if ($model->foto_penghargaan) {
        $filePath = 'penghargaan/' . $model->foto_penghargaan;
        Storage::disk('public')->delete($filePath);
    }
    $model->delete();
    return response()->json([]);
  }
}
