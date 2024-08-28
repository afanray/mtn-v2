<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Http\Request\AjangTalentaRequest;
  use App\Models\AjangTalenta;
  use Illuminate\Http\JsonResponse;

  class AjangTalentaController extends Controller
	{
		public function index()
		{
      return AjangTalenta::query()->with(['lembaga','lembaga_induk','lembaga_unit','bidang'])->simplePaginate(30);
		}

    public function store(AjangTalentaRequest $request): JsonResponse{
      $model = new AjangTalenta();
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
      return response()->json([
        'status' => 'success',
        'data'=>$model
      ]);
    }
	}
