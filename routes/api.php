<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login',[\App\Http\Controllers\AuthController::class,'loginAPI'])->name('auth.api-login');
Route::post('/logout',[\App\Http\Controllers\AuthController::class,'logoutAPI'])->name('auth.api-logout');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware(['auth:api'])->group(function () {
  Route::get('/provinces',[\App\Http\Controllers\Api\ProvincesController::class,'index'])->name('api.provinces');
  Route::get('/regencies',[\App\Http\Controllers\Api\RegenciesController::class,'index'])->name('api.regencies');
  Route::get('/lembaga',[\App\Http\Controllers\Api\LembagaController::class,'index'])->name('api.lembaga');
  Route::post('/add-lembaga',[\App\Http\Controllers\Api\LembagaController::class,'store'])->name('api.lembaga.add');
  Route::get('/talenta',[\App\Http\Controllers\Api\TalentaController::class,'index'])->name('api.talenta');
  Route::post('/add-talenta',[\App\Http\Controllers\Api\TalentaController::class,'store'])->name('api.talenta.add');
  Route::get('/penghargaan',[\App\Http\Controllers\Api\PenghargaanController::class,'index'])->name('api.penghargaan');
  Route::get('/kategori-level-talenta',[\App\Http\Controllers\Api\TalentaController::class,'getLevelTalenta'])->name('api.talenta.level');
  Route::get('/bidang',[\App\Http\Controllers\Api\BidangController::class,'index'])->name('api.bidang');
  Route::get('/highlight-talenta',[\App\Http\Controllers\Api\HighlightTalentaController::class,'index'])->name('api.highlight-talenta');
  Route::post('/add-highlight-talenta',[\App\Http\Controllers\Api\HighlightTalentaController::class,'store'])->name('api.highlight-talenta.add');
  Route::get('/ajang-talenta',[\App\Http\Controllers\Api\AjangTalentaController::class,'index'])->name('api.ajang-talenta');
  Route::post('/add-ajang-talenta',[\App\Http\Controllers\Api\AjangTalentaController::class,'store'])->name('api.ajang-talenta.add');
  Route::get('/anugrah-talenta',[\App\Http\Controllers\Api\AnugrahTalentaController::class,'index'])->name('api.anugrah-talenta');
  Route::post('/add-anugrah-talenta',[\App\Http\Controllers\Api\AnugrahTalentaController::class,'store'])->name('api.anugrah-talenta.add');
});
