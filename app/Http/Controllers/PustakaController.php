<?php

	namespace App\Http\Controllers;

	use App\Constants\Common;
  use App\Models\Pustaka;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;
  use Yajra\DataTables\Facades\DataTables;

  class PustakaController extends Controller
	{
		public function index(): View
		{
      return view('pustaka.index',[
        'activeMenu'=>'pustaka'
      ]);
		}

    public function data(): JsonResponse
    {
      $data = Pustaka::query();
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add()
    {
      $model = new Pustaka();
      return view('pustaka.form',[
        'activeMenu'=>'pustaka',
        'model'=>$model
      ]);
    }

    public function edit(int $id)
    {
      $model = Pustaka::query()->find($id);
      return view('pustaka.form',[
        'activeMenu'=>'pustaka',
        'model'=>$model
      ]);
    }

    public function store(Request $request)
    {
      $model = new Pustaka();
      if($request->input('id')){
        $model = Pustaka::find($request->input('id'));
      }
      $model->title = $request->input('title');
      $model->description = $request->input('description');
      $model->link = $request->input('link');
      $model->type = $request->input('type');
      if ($request->file('image') && $model->type != Common::PUSTAKA_VIDEO){
        $file = $request->file('image');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/pustaka', $fileName);
        $model->image = $fileName;
      }
      if ($request->file('file') && $model->type == Common::PUSTAKA_VIDEO){
        $file = $request->file('file');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/pustaka', $fileName);
        $model->link = $fileName;
        $model->image = null;
      }
      $model->save();
      return redirect()->route('pustaka.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    public function delete(Request $request): JsonResponse
    {
      $model = Pustaka::find($request->input('id'));
      $model->delete();
      return response()->json([]);
    }
	}
