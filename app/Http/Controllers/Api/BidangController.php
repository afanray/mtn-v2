<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Models\Bidang;

  class BidangController extends Controller
	{
		public function index()
		{
			$bidang = Bidang::query()->simplePaginate(10);
      return $bidang;
		}
	}
