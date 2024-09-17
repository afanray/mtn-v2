<?php

	namespace App\Http\Controllers;

	use App\Models\PraktikBaik;
  use App\Models\User;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Http\RedirectResponse;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Illuminate\View\View;
  use Yajra\DataTables\DataTables;

  class PraktikBaikController extends Controller
	{
		public function index()
		{
      return view('praktik-baik.index',[
        'activeMenu'=>'pb'
      ]);
		}

    public function data(): JsonResponse{
      $data = PraktikBaik::query()->with(['lembaga', 'lembaga_induk', 'lembaga_unit', 'bidang']);
      if(User::isSuperAdmin()){
        $data = $data->orderByRaw('praktik_baik.status asc, praktik_baik.created_at desc');
      }else if(User::isPic()){
        $data = $data->where('bidang_id', Auth::user()->bidang_id);
      }else{
        $data = $data->where('created_by', Auth::user()->id);
      }
      $dataTable = DataTables::of($data)->toJson();
      return response()->json($dataTable->getData());
    }

    public function add(): View{
      $model = new PraktikBaik();
      return view('praktik-baik.form',[
        'activeMenu'=>'pb',
        'model' => $model,
        'viewOnly'=> false,
      ]);
    }

    public function edit(int $id): View{
      $model = PraktikBaik::find($id);
      return view('praktik-baik.form',[
        'activeMenu'=>'pb',
        'model' => $model,
        'viewOnly'=> false,
      ]);
    }

    public function view(int $id): View{
      $model = PraktikBaik::find($id);
      return view('praktik-baik.form',[
        'activeMenu'=>'pb',
        'model' => $model,
        'viewOnly'=> true,
      ]);
    }

    public function store(Request $request): RedirectResponse {
      $model = new PraktikBaik();
      if($request->input('id')){
        $model = PraktikBaik::find($request->input('id'));
      }
      if(User::isSuperAdmin()){
        $model->bidang_id = $request->input('bidang_id');
      }else{
        $model->bidang_id = Auth::user()->bidang_id;
      }

      $model->nama_program = $request->input('nama_program');
      $model->lokasi_waktu = $request->input('lokasi_waktu');
      $model->lembaga_id = $request->input('lembaga_id');
      $model->lembaga_induk_id = $request->input('lembaga_induk_id');
      $model->lembaga_unit_id = $request->input('lembaga_unit_id');
      $model->latar_belakang = $request->input('latar_belakang');
      $model->tujuan = $request->input('tujuan');
      $model->luaran_manfaat_dampak = $request->input('luaran_manfaat_dampak');
      $model->pembelajaran = $request->input('pembelajaran');
      $model->kolaborasi = $request->input('kolaborasi');
      $model->kontribusi = $request->input('kontribusi');
      $model->keberlanjutan_program = $request->input('keberlanjutan_program');
      $model->link = $request->input('link');
      $model->nama_pengirim = $request->input('nama_pengirim');
      $model->email = $request->input('email');
      $model->no_hp = $request->input('no_hp');
      $model->status = !User::isOperator();
      if ($request->file('foto')){
        $file = $request->file('foto');
        list($realName,$ext) = explode('.',$file->getClientOriginalName());
        $fileName = $realName.'_'.time().random_int(1,99).'.'.$file->extension();
        $file->storeAs('public/praktik_baik', $fileName);
        $model->foto = $fileName;
      }
      $model->save();
      return redirect()->route('praktik-baik.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Data Berhasil');
    }

    public function saveValidate(Request $request): JsonResponse {
      $model = PraktikBaik::find($request->input('id'));
      $model->status = true;
      $model->save();
      return response()->json([]);
    }

    public function delete(Request $request): JsonResponse {
      $model = PraktikBaik::query()->find($request->input('id'));
      $model->delete();
      return response()->json([]);
    }

	}
