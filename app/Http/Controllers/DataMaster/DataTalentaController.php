<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\Bidang;
use App\Models\Talenta;
use Illuminate\Http\Request;
use App\Models\TalentaKeahlian;
use App\Models\TalentaPrestasi;
use App\Models\HighLightTalenta;
use App\Models\TalentaPendidikan;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\TalentaResource;
use Yajra\DataTables\Facades\DataTables;

class DataTalentaController extends Controller
{
  public function index()
  {
    return view('master.talenta.index', [
      'activeMenu' => 'master-talenta'
    ]);
  }

  public function data($bidangId): JsonResponse
  {
    // @dd($bidangId);
    $user = Auth::user();
    $data = Talenta::query()
             ->with(['lembaga', 'bidang', 'level_talenta', 'lembaga_unit', 'lembaga_induk'])
             ->where('bidang_id', $bidangId );
          // Jika user bukan superadmin, tambahkan filter berdasarkan lembaga_id
              if ($user->role !== 'superadmin') {
                  $data->where('user_id', '=', $user->id);
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

    $request->validate([
        'nama_talenta' => 'required|string|max:255',
        'nik' => 'required|string|max:16',
        'tgllahir' => 'required|string|max:10',
        'lembaga_induk_id' => 'required|integer',
        'lembaga_unit_id' => 'required|integer',
        'lembaga_id' => 'required|integer',
        'bidang_id' => 'required|integer',
        'level_talenta_id' => 'required|integer',
        'province_id' => 'required|integer',
        'regency_id' => 'required|integer',
        'foto_talenta' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // validasi file gambar
    ]);

    $user = Auth::user();
    $model = new Talenta();

    if ($request->input('id')) {
      $model = Talenta::find($request->input('id'));
    }

    $kdBidang = ["IDTR-","IDTS-","IDTO-"];
    $bidangId = $request->input('bidang_id');
    $angkaTerbesar = DB::table('talenta')
            ->selectRaw("MAX(CAST(REGEXP_SUBSTR(kode_talenta, '[0-9]+') AS UNSIGNED)) AS angka_terbesar")
            ->where('bidang_id', $bidangId)
            ->value('angka_terbesar');

    $newKode = isset($kdBidang[$bidangId - 1]) ? $kdBidang[$bidangId - 1] . ($angkaTerbesar + 1) : null;

    $model->kode_talenta = $newKode;
    $model->nama_talenta = $request->input('nama_talenta');
    $model->nik = $request->input('nik');
    $model->tgl_lahir = $request->input('tgllahir');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->bidang_id = $request->input('bidang_id');
    $model->level_talenta_id = $request->input('level_talenta_id');
    $model->province_id = $request->input('province_id');
    $model->regency_id = $request->input('regency_id');
    $model->user_id = $user->id;

    if ($request->file('foto_talenta')) {
        $fileName = $request->file('foto_talenta')->store('public/talenta');
        $model->foto_talenta = basename($fileName);
    }

    $model->save();
    return redirect()->route('data-master.talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
  }

  public function prestasiAdd($id)
      {
        $bidang = Bidang::all();
        $model = Talenta::find($id);
        $talenta = new TalentaResource($model);
        return view('master.talenta.prestasi-form', [
          'activeMenu' => 'master-talenta-tambah-prestasi',
          'model' => $talenta,
          'bidang' => $bidang,
        ]);
      }

  public function keahlianAdd($id)
    {
      $bidang = Bidang::all();
      $model = Talenta::find($id);
      $talenta = new TalentaResource($model);
      return view('master.talenta.keahlian-form', [
        'activeMenu' => 'master-talenta-tambah-keahlian',
        'model' => $talenta,
        'bidang' => $bidang,
      ]);
    }
    public function educationAdd($id)
    {
      $bidang = Bidang::all();
      $model = Talenta::find($id);
      $talenta = new TalentaResource($model);
      return view('master.talenta.education-form', [
        'activeMenu' => 'master-talenta-tambah-education',
        'model' => $talenta,
        'bidang' => $bidang,
      ]);
    }

  public function prestasiStore(Request $request, $id): RedirectResponse
  {
    $model = new TalentaPrestasi();
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

  public function educationStore(Request $request, $id): RedirectResponse
  {
    $model = new TalentaPendidikan();
    $model->talenta_id = $id;
    $model->tingkat = $request->input('tingkat');
    $model->nama = $request->input('nama');
    $model->tgl_lulus = $request->input('tgl_lulus');
    $model->tgl_lulus = $request->input('tgl_lulus');
    $model->ijazah_url = $request->input('ijazah_url');
    if ($request->file('foto_ijazah')) {
      $file = $request->file('foto_ijazah');
      list($realName, $ext) = explode('.', $file->getClientOriginalName());
      $fileName = $realName . '_' . time() . random_int(1, 99) . '.' . $file->extension();
      $file->storeAs('public/ijazah', $fileName);
      $model->foto_ijazah = $fileName;
    }
    $model->save();
    return redirect()->route('data-master.talenta.index')->with('alert-success', 'Tambah Data Berhasil');
  }


  public function keahlianStore(Request $request, $id): RedirectResponse
  {
 
    $model = new TalentaKeahlian();
    $model->talenta_id = $id;
    $model->nama_keahlian = $request->input('nama_keahlian');
    $model->deskripsi = $request->input('deskripsi');
    $model->url = $request->input('url');
    $model->save();
    return redirect()->route('data-master.talenta.index')->with('alert-success', 'Tambah Data Berhasil');
  }

 public function getTalentaList(Request $request)
  {
      // Ambil bidang_id dari request
      $user = Auth::user();
      $bidangId = $request->input('bidang_id');
      // Dapatkan Talenta berdasarkan bidang_id yang dipilih
      $talenta = Talenta::where('bidang_id', $bidangId);
      // Tambahkan syarat tambahan jika user bukan superadmin
      if ($user->role !== 'superadmin') {
          $talenta->when($user, function ($query, $user) {
              return $query->where('user_id', $user->id);
          });
      }
      // Eksekusi query untuk mendapatkan hasilnya
      $talenta = $talenta->get(['id', 'kode_talenta', 'nama_talenta']);
      // Kirim response dalam format JSON
      return response()->json($talenta);
  }


  public function delete(int $id): JsonResponse
  {
    $model = Talenta::find($id);
    HighLightTalenta::query()->where('talenta_id', $id)->delete();
    TalentaPrestasi::query()->where('talenta_id', $id)->delete();
    TalentaPendidikan::query()->where('talenta_id', $id)->delete();
    TalentaKeahlian::query()->where('talenta_id', $id)->delete();
    HighLightTalenta::query()->where('talenta_id', $id)->delete();
    $model->delete();
    return response()->json([]);
  }

 

   
}
