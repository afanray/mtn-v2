<?php

	namespace App\Http\Controllers;

  use App\Models\AnugrahTalenta;
  use App\Models\Lembaga;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;
  use Yajra\DataTables\DataTables;

  class AnugrahTalentaController extends Controller
	{
    public function index(): View
    {
      return view('anugrah-talenta.index',[
        'activeMenu'=>'ant'
      ]);
    }
    public function data(): JsonResponse{
      $data = AnugrahTalenta::query()->with('bidang');
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add(): View {
      $lembaga = Lembaga::all();
      $model = new AnugrahTalenta();
      return view('anugrah-talenta.form',[
        'activeMenu'=>'ant',
        'model' => $model,
        'lembaga'=>$lembaga
      ]);
    }

    public function edit(int $id): View {
      $lembaga = Lembaga::all();
      $model = AnugrahTalenta::find($id);
      return view('anugrah-talenta.form',[
        'activeMenu'=>'ant',
        'model' => $model,
        'lembaga'=>$lembaga
      ]);
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request): RedirectResponse {
      $model = new AnugrahTalenta();
      if($request->input('id')){
        $model = AnugrahTalenta::find($request->input('id'));
      }
      $model->nama_kegiatan = $request->input('nama_kegiatan');
      $model->tahun_pelaksanaan = $request->input('tahun_pelaksanaan');
      $model->desc_kegiatan = $request->input('desc_kegiatan');
      $model->link_web = $request->input('link_web');
      $model->bidang_id = $request->input('bidang_id');
      $model->tingkat_rekognisi = $request->input('tingkat_rekognisi');
      if ($request->file('foto')){
        $file = $request->file('foto');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/anugrah_talenta', $fileName);
        $model->foto = $fileName;
      }
      $model->save();
      return redirect()->route('anugrah-talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    public function delete(int $id): JsonResponse {
      $model = AnugrahTalenta::find($id);
      $model->delete();
      return response()->json([]);
    }
	}
