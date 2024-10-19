<?php


	namespace App\Http\Controllers;

	use App\Constants\Common;
  use App\Models\Pustaka;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;
  use Yajra\DataTables\Facades\DataTables;
  use Illuminate\Support\Facades\Storage;


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

  // Jika ada file foto_penghargaan baru
    if ($request->file('image') && $model->type != Common::PUSTAKA_VIDEO) {
        // Hapus file lama jika ada
        if ($model->image && Storage::exists('public/pustaka/' . $model->image)) {
            Storage::delete('public/pustaka/' . $model->image);
        }

        // Simpan file baru
        $fileName = $request->file('image')->store('public/pustaka');
        $model->image = basename($fileName);
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
       
      if (!$model) {
            return response()->json(['error' => 'Talenta tidak ditemukan'], 404);
        }
      if ($model->image) {
            $filePath = 'pustaka/' . $model->image;
            Storage::disk('public')->delete($filePath);
      }
      $model->delete();
      return response()->json([]);
    }
	}
