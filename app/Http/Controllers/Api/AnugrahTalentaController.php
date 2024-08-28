<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Http\Request\AnugrahTalentaRequest;
  use App\Models\AnugrahTalenta;
  use Illuminate\Http\JsonResponse;

  class AnugrahTalentaController extends Controller
	{
		public function index()
		{
      return AnugrahTalenta::query()->with('bidang')->simplePaginate(30);
		}

    public function store(AnugrahTalentaRequest $request): JsonResponse{
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
      return response()->json([
        'status' => 'success',
        'data'=>$model
      ]);
    }
	}
