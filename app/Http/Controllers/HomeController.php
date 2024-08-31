<?php

namespace App\Http\Controllers;

use App\Constants\Common;
use App\Models\AjangTalenta;
use App\Models\AnugrahTalenta;
use App\Models\Bidang;
use App\Models\HighLightTalenta;
use App\Models\PraktikBaik;
use App\Models\Province;
use App\Models\Pustaka;
use App\Models\Testimoni;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
  // public function index(): View
  // {
  //   $highlightTalenta = HighLightTalenta::query()->with(['prizes', 'talenta', 'lembaga'])->limit(4)->get();
  //   $anugrahTalenta = AnugrahTalenta::query()->with(['bidang'])->limit(4)->get();
  //   $ajangTalenta = AjangTalenta::query()->with(['bidang', 'lembaga'])->limit(4)->get();
  //   $province = Province::all();
  //   $testimoni = Testimoni::valid()->with(['province', 'regency'])->get();
  //   $praktikBaik = PraktikBaik::valid()->with(['bidang'])->limit(4)->get();
  //   $bidang = Bidang::all();
  //   return view('landing.home', [
  //     'highlight_talenta' => $highlightTalenta,
  //     'anugrah_talenta' => $anugrahTalenta,
  //     'ajang_talenta' => $ajangTalenta,
  //     'province' => $province,
  //     'testimoni' => $testimoni,
  //     'praktik_baik' => $praktikBaik,
  //     'bidang' => $bidang,
  //     'activeMenu' => 'home'
  //   ]);
  // }

  public function index(): View
  {
    $highlightTalenta = HighLightTalenta::query()->with(['prizes', 'talenta', 'lembaga'])->limit(4)->get();
    $anugrahTalenta = AnugrahTalenta::query()->with(['bidang'])->limit(4)->get();
    $ajangTalenta = AjangTalenta::query()->with(['bidang', 'lembaga'])->limit(4)->get();
    $province = Province::all();
    $testimoni = Testimoni::valid()->with(['province', 'regency'])->get();
    $praktikBaik = PraktikBaik::valid()->with(['bidang'])->limit(4)->get();
    $bidang = Bidang::all();
    return view('landing.new-home', [
      'highlight_talenta' => $highlightTalenta,
      'anugrah_talenta' => $anugrahTalenta,
      'ajang_talenta' => $ajangTalenta,
      'province' => $province,
      'testimoni' => $testimoni,
      'praktik_baik' => $praktikBaik,
      'bidang' => $bidang,
      'activeMenu' => 'home'
    ]);
  }

  public function about(): View
  {
    return view('landing.about', [
      'activeMenu' => 'about'
    ]);
  }

  public function news(): View
  {
    $highlightTalenta = HighLightTalenta::query()->with(['prizes', 'talenta', 'lembaga'])->limit(4)->get();
    $anugrahTalenta = AnugrahTalenta::query()->with(['bidang'])->limit(4)->get();
    $ajangTalenta = AjangTalenta::query()->with(['bidang', 'lembaga'])->limit(4)->get();

    return view('landing.news', [
      'highlight_talenta' => $highlightTalenta,
      'anugrah_talenta' => $anugrahTalenta,
      'ajang_talenta' => $ajangTalenta,
      'activeMenu' => 'news'
    ]);
  }

  public function highlightTalenta(Request $request): View
  {
    $bidang_id = (int) strip_tags($request->input('_b'));
    if (!empty($bidang_id) && !is_int($bidang_id)) {
      abort(404);
    }
    $bidang_id = $bidang_id === 0 ? null : $bidang_id;
    $highlightTalenta = HighLightTalenta::query()->with(['prizes', 'talenta', 'lembaga'])
      ->when($bidang_id, function ($query) use ($bidang_id) {
        return $query->where('bidang_id', $bidang_id);
      })
      ->paginate(12);
    $highlightTalenta->withPath('/highlight-talenta' . ($bidang_id ? '?_b=' . $bidang_id : ''));
    $bidang = Bidang::all();
    $maps = DB::table('province')
      ->select('province.id', 'province.name', 'province.latitude', 'province.longitude', DB::raw('count(highlight_talenta.id) as total'))
      ->leftJoin('lembaga', 'lembaga.province_id', '=', 'province.id')
      ->leftJoin('highlight_talenta', function ($join) use ($bidang_id) {
        $qJoin = $join->on('highlight_talenta.lembaga_unit_id', '=', 'lembaga.id');
        if (!empty($bidang_id)) {
          $qJoin = $qJoin->where('bidang_id', $bidang_id);
        }
        return $qJoin;
      })
      ->groupBy(['province.id', 'province.name', 'province.latitude', 'province.longitude'])
      ->orderBy('province.id')
      ->get();
    return view('landing.highlight-talenta', [
      'highlight_talenta' => $highlightTalenta,
      'activeMenu' => 'news',
      'bidang' => $bidang,
      'bidang_id' => $bidang_id,
      'maps' => $maps
    ]);
  }

  public function ajangTalenta(Request $request): View
  {
    $bidang_id = (int) strip_tags($request->input('_b'));
    if (!empty($bidang_id) && !is_int($bidang_id)) {
      abort(404);
    }
    $bidang_id = $bidang_id === 0 ? null : $bidang_id;
    $ajangTalenta = AjangTalenta::query()->with(['bidang', 'lembaga'])
      ->when($bidang_id, function ($query) use ($bidang_id) {
        return $query->where('bidang_id', $bidang_id);
      })
      ->paginate(12);
    $ajangTalenta->withPath('/ajang-talenta' . ($bidang_id ? '?_b=' . $bidang_id : ''));
    $bidang = Bidang::all();
    return view('landing.ajang-talenta', [
      'ajang_talenta' => $ajangTalenta,
      'activeMenu' => 'news',
      'bidang' => $bidang,
      'bidang_id' => $bidang_id
    ]);
  }

  public function anugrahTalenta(Request $request): View
  {
    $bidang_id = (int) strip_tags($request->input('_b'));
    if (!empty($bidang_id) && !is_int($bidang_id)) {
      abort(404);
    }
    $bidang_id = $bidang_id === 0 ? null : $bidang_id;
    $anugrahTalenta = AnugrahTalenta::query()->with(['bidang'])
      ->when($bidang_id, function ($query) use ($bidang_id) {
        return $query->where('bidang_id', $bidang_id);
      })
      ->paginate(12);
    $anugrahTalenta->withPath('/anugrah-talenta' . ($bidang_id ? '?_b=' . $bidang_id : ''));
    $bidang = Bidang::all();
    return view('landing.anugrah-talenta', [
      'anugrah_talenta' => $anugrahTalenta,
      'activeMenu' => 'news',
      'bidang' => $bidang,
      'bidang_id' => $bidang_id
    ]);
  }

  public function praktikBaik(Request $request): View
  {
    $bidang_id = (int) strip_tags($request->input('_b'));
    if (!empty($bidang_id) && !is_int($bidang_id)) {
      abort(404);
    }
    $bidang_id = $bidang_id === 0 ? null : $bidang_id;
    $praktikBaik = PraktikBaik::query()->with(['bidang'])
      ->when($bidang_id, function ($query) use ($bidang_id) {
        return $query->where('bidang_id', $bidang_id);
      })
      ->paginate(12);
    $praktikBaik->withPath('/praktik-baik' . ($bidang_id ? '?_b=' . $bidang_id : ''));
    $bidang = Bidang::all();
    return view('landing.praktik-baik', [
      'praktik_baik' => $praktikBaik,
      'activeMenu' => 'pb',
      'bidang' => $bidang,
      'bidang_id' => $bidang_id
    ]);
  }

  public function praktikBaikDetail(string $slug): View
  {
    list($id, $title) = explode('-', $slug);
    $praktikBaik = PraktikBaik::query()->with(['bidang', 'lembaga', 'lembaga_induk', 'lembaga_unit'])
      ->findOrFail($id);
    return view('landing.praktik-baik-detail', [
      'praktik_baik' => $praktikBaik,
      'activeMenu' => 'pb',
    ]);
  }

  public function pustaka()
  {
    $pustaka = Pustaka::all()->collect();
    $kebijakan = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_KEBIJAKAN;
    })->values()->all();
    $pedomanTeknis = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_PEDOMAN;
    })->values()->all();
    $pustakaVideo = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_VIDEO;
    })->values()->all();;
    $pustakaInfo = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_INFOGRAFIS;
    })->values()->all();
    return view('landing.pustaka', [
      'activeMenu' => 'library',
      'kebijakan' => $kebijakan,
      'pedomanTeknis' => $pedomanTeknis,
      'pustakaVideo' => $pustakaVideo,
      'pustakaInfo' => $pustakaInfo,
    ]);
  }

  public function postTesti(Request $request): JsonResponse
  {
    $model = new Testimoni();
    $model->nama = $request->input('test_name');
    $model->no_hp = $request->input('test_no_hp');
    $model->email = $request->input('test_email');
    $model->nama_lembaga = $request->input('lembaga_name');
    $model->alamat_lembaga = $request->input('lembaga_address');
    $model->province_id = $request->input('test_province');
    $model->regency_id = $request->input('test_regency');
    $model->bidang_id = $request->input('test_bidang');
    $model->konten = $request->input('test_konten');
    $model->status = false;
    if ($request->file('test_foto')) {
      $file = $request->file('test_foto');
      list($realName, $ext) = explode('.', $file->getClientOriginalName());
      $fileName = $realName . '_' . time() . random_int(1, 99) . '.' . $file->extension();
      $file->storeAs('public/testimoni', $fileName);
      $model->foto = $fileName;
    }
    $model->save();
    return response()->json([]);
  }

  public function sinergi(): View
  {
    return view('landing.sinergi', [
      'activeMenu' => 'sinergi'
    ]);
  }

  public function contact(): View
  {
    return view('landing.contact', [
      'activeMenu' => 'contact'
    ]);
  }
}
