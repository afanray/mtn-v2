<?php

namespace App\Http\Controllers\DataMaster;

use App\Models\Bidang;
use App\Models\Talenta;
use Illuminate\Http\Request;
use App\Models\TalentaKeahlian;
use App\Models\TalentaPrestasi;
use App\Models\HighLightTalenta;
use App\Models\TalentaPendidikan;
use App\Models\DetailRisnov;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\TalentaResource;
use App\Models\DetailOlahraga;
use App\Models\DetailSenbud;
use Illuminate\Support\Facades\Storage;
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
      ->with(['lembaga', 'bidang', 'level_talenta', 'lembaga_unit', 'lembaga_induk', 'detail_risnov', 'detail_senbud', 'detail_olahraga'])
      ->where('bidang_id', $bidangId);
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
    // menentukan relasi berdasarkan bidang_id
    $relasi = match ($model->bidang_id) {
      1 => 'detail_risnov',
      2 => 'detail_senbud',
      3 => 'detail_olahraga',
      default => null
    };


    return view('master.talenta.form', [
      'activeMenu' => 'master-talenta',
      'model' => $model,
      'bidang' => $bidang,
      'relasi' => $relasi,
    ]);
  }

  public function edit(int $id)
  {
    $bidang = Bidang::all();
    // $model = Talenta::find($id);

    $model = Talenta::with(['detail_risnov', 'detail_senbud', 'detail_olahraga'])->findOrFail($id);


    $relasi = match ($model->bidang_id) {
      1 => 'detail_risnov',
      2 => 'detail_senbud',
      3 => 'detail_olahraga',
      default => null
    };

    return view('master.talenta.form', [
      'activeMenu' => 'master-talenta',
      'model' => $model,
      'relasi' => $relasi,
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

    // @dd($request->all());


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

    $kdBidang = ["IDTR-", "IDTS-", "IDTO-"];
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
    $model->created_by = $user->id;

    // Jika ada file foto_penghargaan baru
    if ($request->file('foto_talenta')) {
      // Hapus file lama jika ada
      if ($model->foto_talenta && Storage::exists('public/talenta/' . $model->foto_talenta)) {
        Storage::delete('public/talenta/' . $model->foto_talenta);
      }

      // Simpan file baru
      $fileName = $request->file('foto_talenta')->store('public/talenta');
      $model->foto_talenta = basename($fileName);
    }

    $model->save();

    if ($request->bidang_id == 1) {
      $detailRisnov = DetailRisnov::firstOrNew(['talenta_id' => $model->id]);
      $detailRisnov->talenta_id = $model->id;
      $detailRisnov->asal_sekolah = $request->input('asal_sekolah');
      $detailRisnov->jenis_prestasi = $request->input('jenis_prestasi');
      $detailRisnov->asal_perguruan_tinggi = $request->input('asal_perguruan_tinggi');
      $detailRisnov->publikasi_artikel_ilmiah_media = $request->input('publikasi_artikel_ilmiah_media');
      $detailRisnov->publikasi_peer_reviewed_jurnal = $request->input('publikasi_peer_reviewed_jurnal');
      $detailRisnov->afiliasi = $request->input('afiliasi');
      $detailRisnov->url_scopus = $request->input('url_scopus');
      $detailRisnov->url_google_scholar = $request->input('url_google_scholar');
      $detailRisnov->menjadi_anggota_riset = $request->input('menjadi_anggota_riset');
      $detailRisnov->hibah_penelitian_nasional = $request->input('hibah_penelitian_nasional');
      $detailRisnov->hibah_penelitian_internasional = $request->input('hibah_penelitian_internasional');
      $detailRisnov->jumlah_publikasi_peer_reviewed_jurnal_lead_author = $request->input('jumlah_publikasi_peer_reviewed_jurnal_lead_author');
      $detailRisnov->bidang_kepakaran = $request->input('bidang_kepakaran');
      $detailRisnov->pengalaman_pimpinan_kelompok_riset_rnd_lab = $request->input('pengalaman_pimpinan_kelompok_riset_rnd_lab');
      $detailRisnov->post_doctoral = $request->input('post_doctoral');
      $detailRisnov->skor_h_index = $request->input('skor_h_index');
      $detailRisnov->jumlah_paten = $request->input('jumlah_paten');
      $detailRisnov->nilai_perilaku_ilmiah_konsistensi_outcome = $request->input('nilai_perilaku_ilmiah_konsistensi_outcome');
      $detailRisnov->rekomendasi_intervensi = $request->input('rekomendasi_intervensi');
      $detailRisnov->save();
    }


    if ($request->bidang_id == 2) {
      $detailSenbud = DetailSenbud::firstOrNew(['talenta_id' => $model->id]);
      $detailSenbud->talenta_id = $model->id;
      $detailSenbud->asal_sekolah = $request->input('asal_sekolah');
      $detailSenbud->jenis_prestasi = $request->input('jenis_prestasi');
      $detailSenbud->jenjang_pendidikan = $request->input('jenjang_pendidikan');
      $detailSenbud->lama_praktek_artistik = $request->input('lama_praktek_artistik');
      $detailSenbud->rekognisi = $request->input('rekognisi');
      $detailSenbud->rekomendasi_intervensi = $request->input('rekomendasi_intervensi');
      $detailSenbud->save();
    }

    if ($request->bidang_id == 3) {
      $detailOlahraga = DetailOlahraga
        ::firstOrNew(['talenta_id' => $model->id]);
      $detailOlahraga->talenta_id = $model->id;
      $detailOlahraga->asal_sekolah = $request->input('asal_sekolah');
      $detailOlahraga->jenis_prestasi = $request->input('jenis_prestasi');
      $detailOlahraga->nomor_kategori = $request->input('nomor_kategori');
      $detailOlahraga->cabor_ioco = $request->input('cabor_ioco');
      $detailOlahraga->jaringan_kopetensi = $request->input('jaringan_kopetensi');
      $detailOlahraga->wadah_pembinaan = $request->input('wadah_pembinaan');
      $detailOlahraga->asal_sekolah = $request->input('asal_sekolah');
      $detailOlahraga->rekomendasi_intervensi = $request->input('rekomendasi_intervensi');
      $detailOlahraga->save();
    }

    return redirect()->route('data-master.talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
  }




  public function prestasiAdd($id)
  {
    $bidang = Bidang::all();
    $model = Talenta::find($id);
    $talenta = new TalentaResource($model);
    $method = "add";
    return view('master.talenta.prestasi-form', [
      'activeMenu' => 'master-talenta-tambah-prestasi',
      'model' => $talenta,
      'bidang' => $bidang,
      'method' => $method
    ]);
  }
  public function prestasiEdit($id)
  {
    $bidang = Bidang::all();
    $model = TalentaPrestasi::find($id);
    $talenta = new TalentaResource($model);
    $method = "edit";
    return view('master.talenta.prestasi-form', [
      'activeMenu' => 'master-talenta-edit-prestasi',
      'model' => $talenta,
      'bidang' => $bidang,
      'method' => $method,
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
    return redirect()->route('data-master.talenta.show', $id)->with('alert-success', 'Tambah Data Berhasil');
  }

  public function prestasiStoreEdit(Request $request, $id): RedirectResponse
  {
    $model = TalentaPrestasi::find($id);
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
    return redirect()->route('data-master.talenta.show', $request->input('idTalenta'))->with('alert-success', 'Edit Data Berhasil');
  }

  public function prestasiDelete(int $id): RedirectResponse
  {
    $model = TalentaPrestasi::find($id);
    $model->delete();

    return redirect()->back()->with('alert-success', 'Hapus Data Berhasil');
  }

  public function educationAdd($id)
  {
    $bidang = Bidang::all();
    $model = Talenta::find($id);
    $method = "add";
    $talenta = new TalentaResource($model);
    return view('master.talenta.education-form', [
      'activeMenu' => 'master-talenta-tambah-education',
      'model' => $talenta,
      'bidang' => $bidang,
      'method' => $method

    ]);
  }

  public function educationEdit($id)
  {
    $model = TalentaPendidikan::find($id);
    $talenta = new TalentaResource($model);
    $method = "edit";
    return view('master.talenta.education-form', [
      'activeMenu' => 'master-talenta-edit-education',
      'model' => $talenta,
      'method' => $method,
    ]);
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
      $fileName = $request->file('foto_ijazah')->store('public/ijazah');
      $model->foto_ijazah = basename($fileName);
    }
    $model->save();

    return redirect()->route('data-master.talenta.show', $id)->with('alert-success', 'Tambah Data Berhasil');
  }

  public function educationStoreEdit(Request $request, $id): RedirectResponse
  {
    $model = TalentaPendidikan::find($id);

    $model->tingkat = $request->input('tingkat');
    $model->nama = $request->input('nama');
    $model->tgl_lulus = $request->input('tgl_lulus');
    $model->tgl_lulus = $request->input('tgl_lulus');
    $model->ijazah_url = $request->input('ijazah_url');

    // Cek jika ada file baru yang diunggah
    if ($request->file('foto_ijazah')) {
      // Hapus file ijazah lama jika ada
      if ($model->foto_ijazah && Storage::exists('public/ijazah/' . $model->foto_ijazah)) {
        Storage::delete('public/ijazah/' . $model->foto_ijazah);
      }

      // Simpan file ijazah baru
      $fileName = $request->file('foto_ijazah')->store('public/ijazah');
      $model->foto_ijazah = basename($fileName);
    }

    $model->save();

    return redirect()->route('data-master.talenta.show', $request->input('idTalenta'))->with('alert-success', 'Edit Data Berhasil');
  }

  public function educationDelete(int $id): RedirectResponse
  {
    $model = TalentaPendidikan::find($id);
    if (!$model) {
      return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
    }
    if ($model->foto_ijazah) {
      $filePath = 'ijazah/' . $model->foto_ijazah;
      Storage::disk('public')->delete($filePath);
    }

    $model->delete();
    return redirect()->back()->with('alert-success', 'Hapus Data Berhasil');
  }

  public function keahlianAdd($id)
  {
    $bidang = Bidang::all();
    $model = Talenta::find($id);
    $method = "add";
    $talenta = new TalentaResource($model);
    return view('master.talenta.keahlian-form', [
      'activeMenu' => 'master-talenta-tambah-keahlian',
      'model' => $talenta,
      'bidang' => $bidang,
      'method' => $method,
    ]);
  }

  public function keahlianEdit($id)
  {
    $model = TalentaKeahlian::find($id);
    $talenta = new TalentaResource($model);
    $method = "edit";
    return view('master.talenta.keahlian-form', [
      'activeMenu' => 'master-talenta-edit-keahlian',
      'model' => $talenta,
      'method' => $method,
    ]);
  }

  public function keahlianStore(Request $request, $id): RedirectResponse
  {
    $model = new TalentaKeahlian();
    $model->talenta_id = $id;
    $model->nama_keahlian = $request->input('nama_keahlian');
    $model->deskripsi = $request->input('deskripsi');
    $model->url = $request->input('url');
    $model->save();
    return redirect()->route('data-master.talenta.show', $id)->with('alert-success', 'Tambah Data Berhasil');
  }

  public function keahlianStoreEdit(Request $request, $id): RedirectResponse
  {
    $model = TalentaKeahlian::find($id);
    $model->nama_keahlian = $request->input('nama_keahlian');
    $model->deskripsi = $request->input('deskripsi');
    $model->url = $request->input('url');
    $model->save();
    return redirect()->route('data-master.talenta.show', $request->input('idTalenta'))->with('alert-success', 'Edit Data Berhasil');
  }

  public function keahlianDelete(int $id): RedirectResponse
  {
    $model = TalentaKeahlian::find($id);
    $model->delete();

    return redirect()->back()->with('alert-success', 'Hapus Data Berhasil');
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
    // Cek jika model ditemukan
    if (!$model) {
      return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
    }
    if ($model->foto_talenta) {
      $filePath = 'talenta/' . $model->foto_talenta;
      Storage::disk('public')->delete($filePath);
    }

    HighLightTalenta::query()->where('talenta_id', $id)->delete();
    TalentaPrestasi::query()->where('talenta_id', $id)->delete();
    TalentaPendidikan::query()->where('talenta_id', $id)->delete();
    TalentaKeahlian::query()->where('talenta_id', $id)->delete();
    DetailRisnov::query()->where('talenta_id', $id)->delete();
    DetailSenbud::query()->where('talenta_id', $id)->delete();
    DetailOlahraga::query()->where('talenta_id', $id)->delete();
    $model->delete();
    return response()->json([]);
  }
}
