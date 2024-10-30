<?php



	namespace App\Http\Controllers\DataMaster;

	use App\Http\Controllers\Controller;
  use App\Models\Lembaga;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Yajra\DataTables\Facades\DataTables;
  use Illuminate\Support\Facades\Storage;

  class DataLembagaController extends Controller
	{
    public function index()
    {
      return view('master.lembaga.index',[
        'activeMenu'=>'master-lembaga'
      ]);
    }

    public function data(): JsonResponse{
      $data = Lembaga::query()->with(['parent' => [
        'parent',
      ],'province','regency']);
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add(){
      $model = new Lembaga();
      $lembagaInduk = Lembaga::induk()->get();
      $lembagaUnit = [];
      $lembagaIndukId = null;
      $lembagaUnitId = null;
      return view('master.lembaga.form',[
        'activeMenu'=>'master-lembaga',
        'model'=>$model,
        'lembagaInduk' => $lembagaInduk,
        'lembagaUnit' => $lembagaUnit,
        'lembagaIndukId' => $lembagaIndukId,
        'lembagaUnitId' => $lembagaUnitId,
      ]);
    }

    public function edit(int $id){
      $model = Lembaga::with('parent')->where('id',$id)->first();
      $lembagaInduk = Lembaga::induk()->get();
      $lembagaUnit = [];
      $lembagaIndukId = null;
      $lembagaUnitId = null;
      if($model->level == 3){
        $lembagaUnit = Lembaga::unit()->where('parent_id', $model->parent->parent_id)->get();
        $lembagaIndukId = $model->parent->parent_id;
        $lembagaUnitId = $model->parent->id;
      }else if($model->level == 2){
        $lembagaIndukId = $model->parent_id;
      }
      return view('master.lembaga.form',[
        'activeMenu'=>'master-lembaga',
        'model'=>$model,
        'lembagaInduk' => $lembagaInduk,
        'lembagaUnit' => $lembagaUnit,
        'lembagaIndukId' => $lembagaIndukId,
        'lembagaUnitId' => $lembagaUnitId,
      ]);
    }

    public function store(Request $request): RedirectResponse{

      // @dd($request->all());

      $model = new Lembaga();
      if($request->input('id')){
        $model = Lembaga::find($request->input('id'));
      }
      $model->name = $request->input('name');
      $model->address = $request->input('address');
      $model->parent_id = null;
      $model->province_id = $request->input('province_id');
      $model->regency_id = $request->input('regency_id');
      $model->level = $request->input('level');
      if($model->level == 2){
        $model->parent_id = $request->input('lembaga_induk_id');
      }else if($model->level == 3){
        $model->parent_id = $request->input('lembaga_unit_id');
      }
      // Jika ada file iamge lembaga baru
      if ($request->file('image')) {
          // Hapus file lama jika ada
          if ($model->image && Storage::exists('public/lembaga/' . $model->image)) {
              Storage::delete('public/lembaga/' . $model->image);
          }
          // Simpan file baru
          $fileName = $request->file('image')->store('public/lembaga');
          $model->image = basename($fileName);
          // @dd($fileName);
      }
      $model->save();
      return redirect()->route('data-master.lembaga.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    // public function delete(int $id): JsonResponse {

    // }
	}
