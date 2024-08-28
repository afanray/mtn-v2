<?php

	namespace App\Http\Controllers;

	use App\Models\Testimoni;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;
  use Yajra\DataTables\DataTables;

  class TestimoniController extends Controller
	{
		public function index(): View
		{
      return view('testimoni.index',[
        'activeMenu'=>'testi'
      ]);
		}

    public function data(): JsonResponse{
      $data = Testimoni::query()->with(['province', 'regency', 'bidang'])->orderByRaw('testimoni.status asc, testimoni.created_at desc');
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function store(Request $request): JsonResponse{
      $testi = Testimoni::find($request->id);
      $testi->status = true;
      $testi->save();
      return response()->json([]);
    }

    public function delete(Request $request): JsonResponse{
      $testi = Testimoni::find($request->id);
      $testi->delete();
      return response()->json([]);
    }
	}
