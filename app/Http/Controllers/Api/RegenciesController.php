<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Models\Regencies;
  use Illuminate\Http\Request;

  class RegenciesController extends Controller
	{
		public function index(Request $request)
		{
      $province_id = $request->input('province_id');
      return Regencies::query()->when($request->input('province_id'), function ($query) use ($province_id){
        return $query->where('province_id', $province_id);
      })->simplePaginate(30, '*','page',$request->get('page'));
		}
	}
