<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function login(): View {
      return view('auth.login');
    }

    public function submitLogin(Request $request): RedirectResponse {
      $credentials = $request->validate([
        'username' => ['required'],
        'password' => ['required'],
      ]);

      if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('dashboard');
      }
      return redirect('/login')->with('form', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request): RedirectResponse {
      Auth::logout();

      $request->session()->invalidate();

      $request->session()->regenerateToken();

      return redirect('/login');
    }

    public function loginAPI(Request $request): JsonResponse{
      $request->validate([
        'username' => 'required',
        'password' => 'required',
      ]);
      $credentials = $request->only('username', 'password');

      $token = Auth::guard('api')->attempt($credentials);
      if (!$token) {
        return response()->json([
          'status' => 'error',
          'message' => 'Unauthorized',
        ], 401);
      }

      $user = Auth::guard('api')->user();
      $userMdl = User::query()->with(['bidang','lembaga','lembaga_induk_unit','lembaga_unit'])->find($user->id);
      return response()->json([
        'status' => 'success',
        'user' => [
          'name'=>$userMdl->name,
          'email'=>$userMdl->email,
          'role'=>$userMdl->role,
          'lembaga'=>"{$userMdl->lembaga_induk_unit->name} - {$userMdl->lembaga_unit->name} - {$userMdl->lembaga->name}",
          'bidang'=>$userMdl->bidang->name
        ],
        'authorization' => [
          'token' => $token,
          'type' => 'bearer',
        ]
      ]);
    }

    public function logoutAPI(): JsonResponse
    {
      Auth::guard('api')->logout();
      return response()->json([
        'status' => 'success',
        'message' => 'Successfully logged out',
      ]);
    }
}
