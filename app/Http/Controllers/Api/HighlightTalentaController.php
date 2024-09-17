<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Http\Request\HighlightTalentaRequest;
  use App\Models\HighLightTalenta;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;

  class HighlightTalentaController extends Controller
	{
		public function index()
		{
      return HighLightTalenta::query()->with(['lembaga','talenta','bidang','prizes'])->simplePaginate(30);
		}
    public function store(HighlightTalentaRequest $request): JsonResponse{
      $validated = $request->validated();
      $model = new HighLightTalenta();
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
      if ($request->file('foto_penghargaan')){
        $file = $request->file('foto_penghargaan');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/penghargaan', $fileName);
        $model->foto_penghargaan = $fileName;
      }
      $model->save();
      return response()->json([
        'status' => 'success',
        'data'=>$model
      ]);
    }
	}
