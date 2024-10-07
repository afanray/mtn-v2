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

    $mainVideoSrc = "https://www.youtube.com/embed/DRS0G2NNQ-A?si=Ssy5RghjlthPhtI_"; // Default main video
    $videos = [
      "https://www.youtube.com/embed/DRS0G2NNQ-A?si=Ssy5RghjlthPhtI_",
      "https://www.youtube.com/embed/JZ-9nWDhg94?si=_C8xPsDtlUmXd5qF",
      // Add more video URLs as needed
    ];

    // $pustaka = Pustaka::all()->collect();
    // $pustakaAnugrah = $pustaka->filter(function ($p) {
    //   return $p->type == Common::PUSTAKA_ANUGRAH;
    // })->values()->all();
    // $pustakaBeasiswa = $pustaka->filter(function ($p) {
    //   return $p->type == Common::PUSTAKA_BEASISWA;
    // })->values()->all();;


     $dataSorotan = [
      [
        'id' => 1,
        'bidang_id'=>1,
        'name' => 'Prof. Tommy Firman, Ph.D',
        'role' => 'Peraih Top 2% Scientist - ITB',
        'imageUrl' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRCrQEAkIItpqI1PjC2DqArIm7REU5zxaWxqg&s',
        'cover' => '/images/bgAnugrah-01.png',
        'link' => 'https://sappk.itb.ac.id/selamat-prof-em-itb-ir-tommy-firman-m-sc-ph-d-meraih-penghargaan-worlds-top-2-scientist-2023/'
      ],
      [
        'id' => 2,
        'bidang_id'=>2,
        'name' => 'Khozy Rizal Putra ',
        'role' => 'Festival de Cannes short Film 2023',
        'imageUrl' => 'https://media.licdn.com/dms/image/v2/C5603AQHKWtBcjkSMYQ/profile-displayphoto-shrink_400_400/profile-displayphoto-shrink_400_400/0/1641199284281?e=1733961600&v=beta&t=OjSLgIC6okAmEGzpPGU0piPpBGmglMpzGIHAttEeHJk',
        'cover' => '/images/bgAnugrah-02.png',
        'link' => 'https://www.kompasiana.com/rommyzi/66402ae1c57afb6b024332b2/filmografi-khozy-rizal-sutradara-yang-berhasil-membawa-filmnya-dalam-festival-de-cannes-short-film-2023'
      ],
      [
        'id' => 3,
        'bidang_id'=>3,
        'name' => 'Gregoria Mariska Tunjung',
        'role' => 'Atlet Bulu Tangkis Oliempiade Paris 2024',
        'imageUrl' => 'https://thumb.viva.co.id/media/frontend/tokoh/2019/05/21/5ce37fddb05be-gregoria-mariska-tunjung_216_287.jpg',
        'cover' => '/images/bgAnugrah-03.png',
        'link' => 'https://www.detik.com/jateng/berita/d-7483268/profil-gregoria-tunjung-peraih-medali-perunggu-olimpiade-paris-asal-wonogiri/amp#'
      ],
      [
        'id' => 4,
        'bidang_id'=> 1,
        'name' => 'Hana Fajrianti',
        'role' => 'Peraih Juara 1 Ajang Young Scientist Award 2024',
        'imageUrl' => 'https://akcdn.detik.net.id/community/media/visual/2024/10/04/mahasiswa-ui-raih-juara-di-ajang-kompetisi-internasional-jerman_43.jpeg?w=700&q=90',
        'cover' => '/images/bgAnugrah-01.png',
        'link' => 'https://www.kompas.com/edu/read/2024/10/06/132924471/sosok-hana-mahasiswa-ui-juara-young-scientist-award-2024-di-jerman?lgn_method=google&google_btn=onetap'
      ],

    ];

    $dataBeasiswa = [
      [
        "bidang" => "LPDP Scholarship Policy in 2024",
        "image" => "https://img.harianjogja.com/posts/2024/01/09/1160976/lpdp.jpg",
        "deskripsi" => "LPDP berkomitmen untuk menyiapkan pemimpin dan profesional masa depan melalui program beasiswa dan mendorong inovasi melalui pendanaan riset untuk mewujudkan Indonesia yang sejahtera, demokratis, dan maju.",
        "total" => 17004,
        "url" => "https://lpdp.kemenkeu.go.id/en/beasiswa/kebijakan-umum/"
      ],
      [
        "bidang" => "Beasiswa Bank Indonesia",
        "image" => "https://upload.wikimedia.org/wikipedia/commons/3/39/BI_Logo.png",
        "deskripsi" => "Beasiswa unggulan adalah beasiswa yang diberikan pada Perguruan Tinggi Negeri (PTN) yang bekerjasama dengan Bank Indonesia, sedangkan beasiswa reguler adalah beasiswa yang diberikan kepada PTN/PTS/SMK.",
        "total" => 35919,
        "url" => "https://bicara131.bi.go.id/knowledgebase/article/KA-01149/en-us"
      ],
      [
        "bidang" => "Beasiswa Unggulan Kemendikbudristek",
        "image" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyp9I_mSXWWyTXCFsJovRyyfoo3s6RyVw8fA&s",
        "deskripsi" => "Beasiswa unggulan Kemendikbudristek adalah beasiswa yang diberikan oleh Pemerintah Indonesia melalui Kemendikbudristek bagi yang ingin melanjutkan pendidikan ke jenjang S1, S2, dan S3 baik di dalam negeri maupun di luar negeri.",
        "total" => 9322,
        "url" => "https://beasiswaunggulan.kemdikbud.go.id"
      ],
    ];
    return view('landing.new-home', [
      'highlight_talenta' => $highlightTalenta,
      'anugrah_talenta' => $anugrahTalenta,
      'ajang_talenta' => $ajangTalenta,
      'province' => $province,
      'testimoni' => $testimoni,
      'praktik_baik' => $praktikBaik,
      'bidang' => $bidang,
      'activeMenu' => 'home',
      'mainVideoSrc' => $mainVideoSrc,
      'videos' => $videos,
      'dataBeasiswa' =>  $dataBeasiswa,
      'dataSorotan' => $dataSorotan,
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
    })->values()->all();
    $pustakaAnugrah = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_ANUGRAH;
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
      'pustakaAnugrah' => $pustakaAnugrah,
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
