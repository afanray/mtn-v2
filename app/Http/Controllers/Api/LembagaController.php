<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Http\Request\LembagaRequest;
  use App\Models\Lembaga;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;

  class LembagaController extends Controller
	{
		public function index(Request $request)
		{
      $level = $request->get('level');
      $parent_id = $request->get('parent_id');
      $lembaga = Lembaga::query()->with(['parent','province','regency'])
        ->when($request->get('type'), function ($query) use ($level){
          return $query->where('level',$level);
        })
        ->when($request->get('parent_id'), function ($query) use ($parent_id){
          return $query->where('parent_id',$parent_id);
        })->simplePaginate(30,'*','page',$request->get('page'));
      return $lembaga;
		}

    public function store(LembagaRequest $request){
      $request->validated();
      $model = new Lembaga();
      $model->name = $request->input('name');
      $model->address = $request->input('address');
      $model->parent_id = $request->input('parent_id');
      $model->province_id = $request->input('province_id');
      $model->regency_id = $request->input('regency_id');
      $model->level = $request->input('level');
      $model->save();
      return response()->json([
        'status' => 'success',
        'data'=>$model
      ]);
    }
	}
