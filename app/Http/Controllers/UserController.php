<?php

namespace App\Http\Controllers;

use App\Models\Bidang;
use App\Models\InputDataMapping;
use App\Models\Lembaga;
use App\Models\User;
use App\Models\UsersInput;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
  public function index(): View {
    return view('user.index',[
      'activeMenu'=>'user'
    ]);
  }

  public function data(): JsonResponse {
    $data = User::query();
    $dataTable = DataTables::of($data)->toJson();
    return response()->json($dataTable->getData());
  }

  public function add(): View {
    $bidang = Bidang::all();
    $inputs = InputDataMapping::all();
    $inputsUser = [];
    $model = new User();
    return view('user.form',[
      'activeMenu' => 'user',
      'model' => $model,
      'bidang'=>$bidang,
      'inputs'=>$inputs,
      'inputs_user'=>$inputsUser,
    ]);
  }

  public function edit(Request $request, int $id): View {
    $model = User::find($id);
    $bidang = Bidang::all();
    $inputs = InputDataMapping::all();
    $inputsUser = $model->user_inputs ?? [];
    if(count($inputsUser) > 0){
      $colInputUser = collect($inputsUser);
      $colInputUser = $colInputUser->groupBy('input_data_id');
      $inputsUser = $colInputUser->toArray();
    }
    return view('user.form',[
      'activeMenu' => 'user',
      'bidang'=>$bidang,
      'model' => $model,
      'inputs'=>$inputs,
      'inputs_user'=>$inputsUser,
    ]);
  }

  public function store(Request $request): RedirectResponse {
    

      $validator = Validator::make($request->all(), [
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',
            'regex:/[A-Z]/',
            'regex:/[0-9]/',
            'regex:/[@$!%*#?&]/',
        ],
    ], [
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password harus minimal 8 karakter.',
        'password.regex' => 'Password harus mengandung huruf besar, kecil, angka, dan simbol.',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    $model = new User();
    if($request->input('id')){
      $model = User::find($request->input('id'));
    }
    $model->name = $request->input('name');
    $model->username = $request->input('username');
    $model->email = $request->input('email');
    if(($request->input('id') && $request->input('password')) || (!$request->input('id'))){
      $model->password = Hash::make($request->input('password'));
    }
    $model->role = $request->input('role');
    $model->bidang_id = $request->input('bidang_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->save();
    $model->user_inputs()->delete();
    if($model->role === 'operator'){
      $inputs = $request->input('inputs');
      $userInputs = [];
      foreach ($inputs[$model->bidang_id] as $key=>$val) {
        $userInputs[] = new UsersInput([
          'input_data_id'=>$val,
        ]);
      }
      if(count($userInputs) > 0){
        $model->user_inputs()->saveMany($userInputs);
      }
    }

    return redirect()->route('user.index')->with('alert-success', ($request->input('id') ? 'Sunting' : 'Tambah'). ' Pengguna Berhasil');
  }

  public function delete(int $id): JsonResponse {
    $model = User::find($id);
    $model->delete();
    return response()->json([]);
  }


public function updatePassword(): View {
    $userId = auth()->user()->id;
    $model = User::find($userId);
    return view('user.update-form',[
      'activeMenu' => 'update password',
      'model' => $model,
      
    ]);
  }

public function saveNewPassword(Request $request): RedirectResponse {
    // Validasi input
    $validator = Validator::make($request->all(), [
        'oldpassword' => [
            'required',
        ],
        'newpassword' => [
            'required',
            'string',
            'min:8',
            'regex:/[a-z]/',  // Huruf kecil
            'regex:/[A-Z]/',  // Huruf besar
            'regex:/[0-9]/',  // Angka
            'regex:/[@$!%*#?&]/', // Simbol
            'confirmed' // Validasi untuk memastikan password baru dan konfirmasi password cocok
        ],
    ], [
        'oldpassword.required' => 'Password lama wajib diisi.',
        'newpassword.required' => 'Password baru wajib diisi.',
        'newpassword.min' => 'Password baru harus minimal 8 karakter.',
        'newpassword.regex' => 'Password baru harus mengandung huruf besar, kecil, angka, dan simbol.',
        'newpassword.confirmed' => 'Konfirmasi password baru tidak cocok.',
    ]);

    // Jika validasi gagal, kembalikan ke halaman sebelumnya dengan pesan error
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    // Cari pengguna berdasarkan ID
    $model = User::find($request->input('id'));

    // Verifikasi password lama
    if (!Hash::check($request->input('oldpassword'), $model->password)) {
        return redirect()->back()->withErrors(['oldpassword' => 'Password lama tidak sesuai.'])->withInput();
    }

    // Jika password lama sesuai, lakukan hashing dan simpan password baru
    if ($request->filled('newpassword')) {
        $model->password = Hash::make($request->input('newpassword'));
    }

    // Simpan model yang diperbarui
    $model->save();

    // Hapus data input terkait user (sesuai logika di aplikasi)
    $model->user_inputs()->delete();

    // Redirect ke dashboard dengan pesan sukses
    return redirect()->route('user.update-password')->with('alert-success', 'Password berhasil diperbarui.');
}


}
