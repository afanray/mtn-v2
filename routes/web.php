<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/dashboard-capaian', [\App\Http\Controllers\DashboardCapaianController::class, 'index'])->name('dashboard-capaian');
Route::get('/about', [\App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/news', [\App\Http\Controllers\HomeController::class, 'news'])->name('home.news');
Route::get('/highlight-talenta', [\App\Http\Controllers\HomeController::class, 'highlightTalenta'])->name('home.highlight-talenta');
Route::get('/ajang-talenta', [\App\Http\Controllers\HomeController::class, 'ajangTalenta'])->name('home.ajang-talenta');
Route::get('/anugrah-talenta', [\App\Http\Controllers\HomeController::class, 'anugrahTalenta'])->name('home.anugrah-talenta');
Route::get('/praktik-baik', [\App\Http\Controllers\HomeController::class, 'praktikBaik'])->name('home.praktik-baik');
Route::get('/praktik-baik/{slug}', [\App\Http\Controllers\HomeController::class, 'praktikBaikDetail'])->name('home.praktik-baik-detail');
Route::get('/pustaka', [\App\Http\Controllers\HomeController::class, 'pustaka'])->name('home.pustaka');
Route::get('/sinergi', [\App\Http\Controllers\HomeController::class, 'sinergi'])->name('home.sinergi');
Route::get('/contact', [\App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::post('/common/get-regencies', [\App\Http\Controllers\CommonController::class, 'getRegencies'])->name('home.common.get-regencies');
Route::post('/common/post-testi', [\App\Http\Controllers\HomeController::class, 'postTesti'])->name('home.common.post-testi');
Route::post('/common/get-ht-province', [\App\Http\Controllers\CommonController::class, 'getHTProvinsi'])->name('home.common.get-ht-province');
Route::post('/common/get-talenta', [\App\Http\Controllers\CommonController::class, 'getTalentaByCategory'])->name('home.common.get-talenta');

Route::get('login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('login', [\App\Http\Controllers\AuthController::class, 'submitLogin'])->name('auth.login');
Route::middleware(['auth:web'])->group(function () {

  Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('auth.logout');
  Route::prefix('dashboard')->group(function () {
    Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/capaian-indikator', [\App\Http\Controllers\CapaianIndikatorController::class, 'index'])->name('capaian-indikator.index');
    Route::get('/summary', [\App\Http\Controllers\CapaianIndikatorController::class, 'summary'])->name('capaian-indikator.summary');
    Route::post('/save-target', [\App\Http\Controllers\CapaianIndikatorController::class, 'saveTarget'])->name('capaian-indikator.save-target');
    Route::prefix('user')->group(function () {
      Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');
      Route::get('/data', [\App\Http\Controllers\UserController::class, 'data'])->name('user.data');
      Route::get('/add', [\App\Http\Controllers\UserController::class, 'add'])->name('user.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
      Route::get('/delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');
      Route::post('/store', [\App\Http\Controllers\UserController::class, 'store'])->name('user.save');
    });
    Route::prefix('data')->group(function () {
      Route::get('/', [\App\Http\Controllers\DataDasarController::class, 'index'])->name('data.index');
      Route::get('/add-data/{bidang_id}', [\App\Http\Controllers\DataDasarController::class, 'addData'])->name('data.add-data');
      Route::get('/edit-data/{bidang_id}/{id}', [\App\Http\Controllers\DataDasarController::class, 'editData'])->name('data.edit-data');
      Route::post('/store-data', [\App\Http\Controllers\DataDasarController::class, 'store'])->name('data.store-data');
    });
    Route::prefix('highlight-talenta')->group(function () {
      Route::get('/', [\App\Http\Controllers\HighlightTalentaController::class, 'index'])->name('highlight-talenta.index');
      Route::get('/data', [\App\Http\Controllers\HighlightTalentaController::class, 'data'])->name('highlight-talenta.data');
      Route::get('/add', [\App\Http\Controllers\HighlightTalentaController::class, 'add'])->name('highlight-talenta.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\HighlightTalentaController::class, 'edit'])->name('highlight-talenta.edit');
      Route::get('/delete/{id}', [\App\Http\Controllers\HighlightTalentaController::class, 'delete'])->name('highlight-talenta.delete');
      Route::post('/store', [\App\Http\Controllers\HighlightTalentaController::class, 'store'])->name('highlight-talenta.save');
    });
    Route::prefix('ajang-talenta')->group(function () {
      Route::get('/', [\App\Http\Controllers\AjangTalentaController::class, 'index'])->name('ajang-talenta.index');
      Route::get('/data', [\App\Http\Controllers\AjangTalentaController::class, 'data'])->name('ajang-talenta.data');
      Route::get('/add', [\App\Http\Controllers\AjangTalentaController::class, 'add'])->name('ajang-talenta.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\AjangTalentaController::class, 'edit'])->name('ajang-talenta.edit');
      Route::get('/delete/{id}', [\App\Http\Controllers\AjangTalentaController::class, 'delete'])->name('ajang-talenta.delete');
      Route::post('/store', [\App\Http\Controllers\AjangTalentaController::class, 'store'])->name('ajang-talenta.save');
    });
    Route::prefix('anugrah-talenta')->group(function () {
      Route::get('/', [\App\Http\Controllers\AnugrahTalentaController::class, 'index'])->name('anugrah-talenta.index');
      Route::get('/data', [\App\Http\Controllers\AnugrahTalentaController::class, 'data'])->name('anugrah-talenta.data');
      Route::get('/add', [\App\Http\Controllers\AnugrahTalentaController::class, 'add'])->name('anugrah-talenta.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\AnugrahTalentaController::class, 'edit'])->name('anugrah-talenta.edit');
      Route::get('/delete/{id}', [\App\Http\Controllers\AnugrahTalentaController::class, 'delete'])->name('anugrah-talenta.delete');
      Route::post('/store', [\App\Http\Controllers\AnugrahTalentaController::class, 'store'])->name('anugrah-talenta.save');
    });
    Route::prefix('testimoni')->group(function () {
      Route::get('/', [\App\Http\Controllers\TestimoniController::class, 'index'])->name('testimoni.index');
      Route::get('/data', [\App\Http\Controllers\TestimoniController::class, 'data'])->name('testimoni.data');
      Route::post('/store', [\App\Http\Controllers\TestimoniController::class, 'store'])->name('testimoni.save');
      Route::post('/delete', [\App\Http\Controllers\TestimoniController::class, 'delete'])->name('testimoni.delete');
    });
    Route::prefix('common')->group(function () {
      Route::post('/store-lembaga', [\App\Http\Controllers\CommonController::class, 'storeLembaga'])->name('common.lembaga-store');
      Route::post('/store-ref-penghargaan', [\App\Http\Controllers\CommonController::class, 'storeRefPenghargaan'])->name('common.ref-penghargaan-store');
      Route::post('/store-talenta', [\App\Http\Controllers\CommonController::class, 'storeTalenta'])->name('common.talenta-store');
      Route::post('/get-lembaga-unit', [\App\Http\Controllers\CommonController::class, 'getLembagaUnit'])->name('common.get-lembaga-unit');
      Route::post('/get-lembaga-direktorat', [\App\Http\Controllers\CommonController::class, 'getLembagaDirektorat'])->name('common.get-lembaga-direktorat');
      Route::post('/get-regencies', [\App\Http\Controllers\CommonController::class, 'getRegencies'])->name('common.get-regencies');
    });
    Route::prefix('praktik-baik')->group(function () {
      Route::get('/', [\App\Http\Controllers\PraktikBaikController::class, 'index'])->name('praktik-baik.index');
      Route::get('/data', [\App\Http\Controllers\PraktikBaikController::class, 'data'])->name('praktik-baik.data');
      Route::get('/add', [\App\Http\Controllers\PraktikBaikController::class, 'add'])->name('praktik-baik.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\PraktikBaikController::class, 'edit'])->name('praktik-baik.edit');
      Route::get('/view/{id}', [\App\Http\Controllers\PraktikBaikController::class, 'view'])->name('praktik-baik.view');
      Route::post('/store', [\App\Http\Controllers\PraktikBaikController::class, 'store'])->name('praktik-baik.save');
      Route::post('/validate', [\App\Http\Controllers\PraktikBaikController::class, 'saveValidate'])->name('praktik-baik.validate');
      Route::post('/delete', [\App\Http\Controllers\PraktikBaikController::class, 'delete'])->name('praktik-baik.delete');
    });
    Route::prefix('pustaka')->group(function () {
      Route::get('/', [\App\Http\Controllers\PustakaController::class, 'index'])->name('pustaka.index');
      Route::get('/data', [\App\Http\Controllers\PustakaController::class, 'data'])->name('pustaka.data');
      Route::get('/add', [\App\Http\Controllers\PustakaController::class, 'add'])->name('pustaka.add');
      Route::get('/edit/{id}', [\App\Http\Controllers\PustakaController::class, 'edit'])->name('pustaka.edit');
      Route::post('/delete', [\App\Http\Controllers\PustakaController::class, 'delete'])->name('pustaka.delete');
      Route::post('/store', [\App\Http\Controllers\PustakaController::class, 'store'])->name('pustaka.save');
    });
    Route::prefix('data-master')->group(function () {
      Route::prefix('talenta')->group(function () {
        Route::get('/', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'index'])->name('data-master.talenta.index');
        Route::get('/data', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'data'])->name('data-master.talenta.data');
        Route::get('/add', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'add'])->name('data-master.talenta.add');
        Route::get('/edit/{id}', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'edit'])->name('data-master.talenta.edit');
        Route::get('/show/{id}', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'show'])->name('data-master.talenta.show');
        Route::get('/delete/{id}', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'delete'])->name('data-master.talenta.delete');
        Route::post('/store', [\App\Http\Controllers\DataMaster\DataTalentaController::class, 'store'])->name('data-master.talenta.save');
      });
      Route::prefix('lembaga')->group(function () {
        Route::get('/', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'index'])->name('data-master.lembaga.index');
        Route::get('/data', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'data'])->name('data-master.lembaga.data');
        Route::get('/add', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'add'])->name('data-master.lembaga.add');
        Route::get('/edit/{id}', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'edit'])->name('data-master.lembaga.edit');
        Route::get('/delete/{id}', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'delete'])->name('data-master.lembaga.delete');
        Route::post('/store', [\App\Http\Controllers\DataMaster\DataLembagaController::class, 'store'])->name('data-master.lembaga.save');
      });
      Route::prefix('penghargaan')->group(function () {
        Route::get('/', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'index'])->name('data-master.penghargaan.index');
        Route::get('/data', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'data'])->name('data-master.penghargaan.data');
        Route::get('/add', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'add'])->name('data-master.penghargaan.add');
        Route::get('/edit/{id}', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'edit'])->name('data-master.penghargaan.edit');
        Route::get('/delete/{id}', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'delete'])->name('data-master.penghargaan.delete');
        Route::post('/store', [\App\Http\Controllers\DataMaster\DataPenghargaanController::class, 'store'])->name('data-master.penghargaan.save');
      });
    });
  });
});
