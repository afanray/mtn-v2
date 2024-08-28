<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Models\Province;
  use Illuminate\Http\Request;

  class ProvincesController extends Controller
	{
		public function index(Request $request)
		{
			return Province::query()->simplePaginate(50,'*','page',$request->get('page'));
		}
	}
