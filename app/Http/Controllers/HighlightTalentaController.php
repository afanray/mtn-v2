<?php

	namespace App\Http\Controllers;

	use App\Models\Bidang;
  use App\Models\BidangFokus;
  use App\Models\HighLightTalenta;
  use App\Models\Lembaga;
  use App\Models\RefPrizes;
  use App\Models\Talenta;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\View\View;
  use Yajra\DataTables\Facades\DataTables;

  class HighlightTalentaController extends Controller
	{
		public function index(): View
		{
      return view('highlight-talenta.index',[
        'activeMenu'=>'ht'
      ]);
		}
    public function data(): JsonResponse{
      $data = HighLightTalenta::query()->with(['lembaga','talenta','bidang','prizes']);
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add(): View {
      $bidang = Bidang::all();
      $bidangFokus = BidangFokus::all();
      $talenta = Talenta::all();
      $ref_prizes = RefPrizes::all();
      $model = new HighLightTalenta();
      return view('highlight-talenta.form',[
        'activeMenu'=>'ht',
        'model' => $model,
        'bidang'=>$bidang,
        'bidang_fokus'=>$bidangFokus,
        'talenta'=>$talenta,
        'ref_prizes'=>$ref_prizes,
      ]);
    }

    public function edit(int $id): View {
      $bidang = Bidang::all();
      $bidangFokus = BidangFokus::all();
      $talenta = Talenta::all();
      $ref_prizes = RefPrizes::all();
      $model = HighLightTalenta::find($id);
      return view('highlight-talenta.form',[
        'activeMenu'=>'ht',
        'model' => $model,
        'bidang'=>$bidang,
        'bidang_fokus'=>$bidangFokus,
        'talenta'=>$talenta,
        'ref_prizes'=>$ref_prizes,
      ]);
    }

    /**
     * @throws \Exception
     */
    public function store(Request $request): RedirectResponse {
      $model = new HighLightTalenta();
      if($request->input('id')){
        $model = HighLightTalenta::find($request->input('id'));
      }
      $model->talenta_id = $request->input('talenta_id');
      $model->ref_prizes_id = $request->input('ref_prizes_id');
      $model->desc_penghargaan = $request->input('desc_penghargaan');
      $model->link_web = $request->input('link_web');
      $model->bidang_id = $request->input('bidang_id');
      $model->bidang_fokus_id = $request->input('bidang_fokus_id');
      $model->tahun = $request->input('tahun');
      $model->lembaga_id = $request->input('lembaga_id');
      $model->lembaga_induk_id = $request->input('lembaga_induk_id');
      $model->lembaga_unit_id = $request->input('lembaga_unit_id');
      if ($request->file('foto_penghargaan')){
        $file = $request->file('foto_penghargaan');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/penghargaan', $fileName);
        $model->foto_penghargaan = $fileName;
      }
      if($request->input('id')){
        $model->updated_by = auth()->user()->id;
      }
      $model->save();
      return redirect()->route('highlight-talenta.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    public function delete(int $id): JsonResponse {
      $model = HighLightTalenta::find($id);
      $model->delete();
      return response()->json([]);
    }
	}
