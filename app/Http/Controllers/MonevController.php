<?php

namespace App\Http\Controllers;

use App\Models\RencanaAksi;
use Illuminate\Http\Request;
use App\Models\RencanaAksiDetail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\MonevResource;
use App\Models\RencanaAksiPelaksanaan;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class MonevController extends Controller
{
    public function index()
    {
        return view('monev.kl.index', [
            'activeMenu' => 'renaksi-kl',
        ]);
    }


    public function data(): JsonResponse
    {
        $user = Auth::user();
        $data = RencanaAksi::query()
            ->with(['bidang', 'user']);
        // Jika user bukan superadmin, tambahkan filter berdasarkan lembaga_id
        if ($user->role !== 'superadmin') {
            $data->where('created_by', '=', $user->id);
        }
        $dataTable = DataTables::of($data)->toJson();
        return response()->json($dataTable->getData());
    }

    public function show(int $id)
    {
        $data = RencanaAksi::with(['bidang', 'rencana_aksi_details', 'rencana_aksi_pelaksanaan'])
            ->findOrFail($id);
        $model = new MonevResource($data);
        return view('monev.kl.show', [
            'activeMenu' => 'renaksi-kl',
            'model' => $model,
        ]);
    }
    public function add()
    {
        $model = new RencanaAksi();
        return view('monev.kl.form', [
            'activeMenu' => 'renaksi-kl',
            'model' => $model
        ]);
    }

    public function edit(int $id)
    {
        $model = RencanaAksi::query()->find($id);
        return view('monev.kl.form', [
            'activeMenu' => 'renaksi-kl',
            'model' => $model
        ]);
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $model = new RencanaAksi();
        if ($request->input('id')) {
            $model = RencanaAksi::find($request->input('id'));
        }
        $model->kode = $request->input('kode');
        $model->bidang_id = $request->input('bidang_id');
        $model->arah_kebijakan = $request->input('arah_kebijakan');
        $model->strategi_terobosan = $request->input('strategi_terobosan');
        $model->fokus_pelaksanaan = $request->input('fokus_pelaksanaan');
        $model->kode_ro = $request->input('kode_ro');
        $model->rincian_output = $request->input('rincian_output');
        $model->alur_pengembangan = $request->input('alur_pengembangan');
        $model->target = $request->input('target');
        $model->realisasi = $request->input('realisasi');
        $model->satuan = $request->input('satuan');
        $model->alokasi_anggaran = $request->input('alokasi_anggaran');
        $model->realisasi_anggaran = $request->input('realisasi_anggaran');
        $model->lokasi_pelaksanaan_kegiatan = $request->input('lokasi_pelaksanaan_kegiatan');
        $model->sumber_dana = $request->input('sumber_dana');
        $model->instansi_pengampu = $request->input('instansi_pengampu');

        $model->created_by = $user->id;

        $model->save();
        return redirect()->route('monev.kl.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
    }

    public function delete(int $id): JsonResponse
    {

        $model = RencanaAksi::find($id);
        if (!$model) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
        $model->delete();
        return response()->json([]);
    }

    public function monitoringAdd(int $id)
    {

        $data = RencanaAksi::with(['bidang', 'rencana_aksi_details', 'rencana_aksi_pelaksanaan'])
            ->findOrFail($id);
        $model = new MonevResource($data);
        return view('monev.kl.monitoring', [
            'activeMenu' => 'renaksi-kl',
            'model' => $model
        ]);
    }

    public function monitoringSave(Request $request)
    {
        // @dd($request->all());
        $request->validate([
            'rencana_aksi_id' => 'required|exists:rencana_aksi,id',
            'year' => 'required|integer',
            'month' => 'required|integer|min:1|max:12',
            'capaian' => 'nullable|numeric',
            'realisasi_anggaran' => 'nullable|numeric',
            'lokasi_pelaksanaan' => 'nullable|string',
            'status_pelaksanaan' => 'nullable|string',
            'kategori_masalah' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'kondisi_ideal' => 'nullable|string',
            'rencana_tindak_lanjut' => 'nullable|string',
        ]);

        $model = null;

        if ($request->filled('rencana_aksi_detail_id')) {
            $model = RencanaAksiDetail::find($request->input('rencana_aksi_detail_id'));

            if (!$model) {
                return redirect()->back()->with('alert-danger', 'Data tidak ditemukan.');
            }
        } else {
            $model = new RencanaAksiDetail();
        }

        // Simpan detail
        $model->rencana_aksi_id = $request->input('rencana_aksi_id');
        $model->tahun = $request->input('year');
        $model->bulan = $request->input('month');
        $model->capaian = $request->input('capaian');
        $model->realisasi_anggaran = $request->input('realisasi_anggaran');
        $model->lokasi_pelaksanaan = $request->input('lokasi_pelaksanaan');
        $model->status_pelaksanaan = $request->input('status_pelaksanaan');
        $model->save();

        // Cek apakah pelaksanaan untuk detail ini sudah ada
        $rap = RencanaAksiPelaksanaan::firstOrNew([
            'rencana_aksi_detail_id' => $model->id,
        ]);

        $rap->rencana_aksi_id = $request->input('rencana_aksi_id');
        $rap->kategori_masalah = $request->input('kategori_masalah');
        $rap->tantangan_pelaksanaan = $request->input('deskripsi');
        $rap->strategi_pelaksanaan = $request->input('rencana_tindak_lanjut');
        $rap->kondisi_ideal = $request->input('kondisi_ideal');
        $rap->save();

        return redirect()
            ->route('monev.kl.show', $model->rencana_aksi_id)
            ->with('alert-success', ($request->input('rencana_aksi_id') ? 'Sunting' : 'Tambah') . ' Data Berhasil');
    }
}
