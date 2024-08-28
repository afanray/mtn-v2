<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Http\Request\TalentaRequest;
  use App\Models\LevelTalenta;
  use App\Models\Talenta;
  use Illuminate\Http\Request;

  class TalentaController extends Controller
	{
		public function index(Request $request)
		{
      $talenta = Talenta::query()->with(['lembaga_induk','lembaga_unit','lembaga','bidang'])
        ->simplePaginate(30);
      return $talenta;
		}

    public function getLevelTalenta(Request $request){
      $bidang_id = $request->input('bidang_id');
      return LevelTalenta::query()->when($request->input('bidang_id'), function ($query) use ($bidang_id){
        return $query->where('bidang_id', $bidang_id);
      })->simplePaginate(30);
    }

    public function store(TalentaRequest $request){
      $model = new Talenta();
      $model->nama_talenta = $request->input('nama_talenta');
      $model->nik = $request->input('nik');
      $model->lembaga_induk_id = $request->input('lembaga_induk_id');
      $model->lembaga_unit_id = $request->input('lembaga_unit_id');
      $model->lembaga_id = $request->input('lembaga_id');
      $model->bidang_id = $request->input('bidang_id');
      $model->level_talenta_id = $request->input('level_talenta_id');
      if ($request->file('foto_talenta')){
        $file = $request->file('foto_talenta');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/talenta', $fileName);
        $model->foto_talenta = $fileName;
      }
      $model->save();
      return response()->json([
        'status' => 'success',
        'data'=>$model
      ]);
    }
	}
