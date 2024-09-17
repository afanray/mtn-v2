<?php

	namespace App\Http\Controllers\DataMaster;

	use App\Http\Controllers\Controller;
  use App\Models\Bidang;
  use App\Models\HighLightTalenta;
  use App\Models\RefPrizes;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Yajra\DataTables\Facades\DataTables;

  class DataPenghargaanController extends Controller
	{

    public function index()
    {
      return view('master.penghargaan.index',[
        'activeMenu'=>'master-penghargaan'
      ]);
    }

    public function data(): JsonResponse{
      $data = RefPrizes::query()->with(['bidang']);
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add(){
      $bidang = Bidang::all();
      $model = new RefPrizes();
      return view('master.penghargaan.form',[
        'activeMenu'=>'master-penghargaan',
        'model' => $model,
        'bidang'=>$bidang,
      ]);
    }

    public function edit(int $id){
      $bidang = Bidang::all();
      $model = RefPrizes::find($id);
      return view('master.penghargaan.form',[
        'activeMenu'=>'master-penghargaan',
        'model' => $model,
        'bidang'=>$bidang,
      ]);
    }

    public function store(Request $request): RedirectResponse{
      $model = new RefPrizes();
      if($request->input('id')){
        $model = RefPrizes::find($request->input('id'));
      }
      $model->name = $request->input('name');
      $model->frequency = $request->input('frequency');
      $model->bidang_id = $request->input('bidang_id');
      $model->average = $request->input('average');
      $model->tingkat = $request->input('tingkat');
      $model->link_web = $request->input('link_web');
      $model->bidang_fokus_id = $request->input('bidang_fokus_id');
      $model->predefined = false;
      $model->save();
      return redirect()->route('data-master.penghargaan.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    public function delete(int $id): JsonResponse {
      $model = RefPrizes::find($id);
      HighLightTalenta::query()->where('ref_prizes_id', $id)->delete();
      $model->delete();

      return response()->json([]);
    }
	}
