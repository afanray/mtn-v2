<?php

	namespace App\Http\Controllers\Api;

	use App\Http\Controllers\Controller;
  use App\Models\RefPrizes;

  class PenghargaanController extends Controller
	{
		public function index()
		{
			$penghargaan = RefPrizes::query()->with(['bidang','bidang_fokus'])->simplePaginate(30);
      return $penghargaan;
		}
	}
