<?php

namespace App\Http\Controllers;

use App\Constants\Common;
use App\Models\AjangTalenta;
use App\Models\AnugrahTalenta;
use App\Models\Bidang;
use App\Models\HighLightTalenta;
use App\Models\News;
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
  public function index(): View
  {
    $highlightTalenta = HighLightTalenta::query()->with(['prizes', 'talenta', 'lembaga'])->limit(4)->get();
    $anugrahTalenta = AnugrahTalenta::query()->with(['bidang'])->limit(4)->get();
    $ajangTalenta = AjangTalenta::query()->with(['bidang', 'lembaga'])->limit(4)->get();
    $province = Province::all();
    $testimoni = Testimoni::valid()->with(['province', 'regency'])->get();
    $praktikBaik = PraktikBaik::valid()->with(['bidang'])->limit(4)->get();
    $bidang = Bidang::all();

    $mainVideoSrc = "https://www.youtube.com/embed/NTt0TzzCOC8?si=J_l5xAAeOLgyw3OE_"; // Default main video
    $videos = [
      "https://www.youtube.com/embed/NTt0TzzCOC8?si=J_l5xAAeOLgyw3OE",
      "https://www.youtube.com/embed/d3zEvTTpHuk?si=jarUuA5GgYwmqlbi",
      "https://www.youtube.com/embed/DRS0G2NNQ-A?si=Ssy5RghjlthPhtI_",
      // "https://www.youtube.com/embed/JZ-9nWDhg94?si=_C8xPsDtlUmXd5qF",
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


$dataBerita = [
      [
        'id' => 1,
        'bidang_id'=>1,
        'name' => 'Rizal Azis',
        'role'=>'Mahasiswa doktoral asal Indonesia di University of Nottingham',
        'tanggal'=>'2024',
        'judul'=>'Kabar Baik dari Inggris, Penelitian Mahasiswa Indonesia Soal Sel Punca Raih Hak Paten',
        'deskripsi'=>'Jakarta: Mahasiswa doktoral asal Indonesia di University of Nottingham, Rizal Azis, meraih hak paten pengembangbiakan sel punca non-hewani (xeno-free) di Inggris. Capaian itu diraih setelah serangkaian penelitian bersama pembimbingnya, Profesor Nick Hannan sejak 2020.',
        'imageUrl' => 'https://cdn.medcom.id/dynamic/content/2024/10/04/1718010/cgoHsRav8X.jpg?w=1024',
        'link' => 'https://www.medcom.id/pendidikan/news-pendidikan/Obz5BmxN-kabar-baik-dari-inggris-penelitian-mahasiswa-indonesia-soal-sel-punca-raih-hak-paten',
        'sumber'=>'medcom.id'
      ],
    ];

    $news = News::query()->where('published', '=', 1) ->orderBy('created_at', 'desc')->limit(4)->get();
    $highlightTalenta = HighLightTalenta::limit(8)->get();
    // @dd( $highlightTalenta);

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
      'dataSorotan' => $highlightTalenta,
      'dataBerita' =>$news
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

    // Ambil mainNews
    $mainNews = News::query()->where('published', '=', 1)
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

    // Dapatkan ID dari mainNews
    $mainNewsIds = $mainNews->pluck('id');

    // Ambil oldNews yang tidak termasuk dalam mainNews
    $oldNews = News::query()->where('published', '=', 1)
        ->whereNotIn('id', $mainNewsIds)
        ->orderBy('created_at', 'desc')
        ->limit(2)
        ->get();

 // Ambil oldNews yang tidak termasuk dalam mainNews
    $moreNews = News::query()->where('published', '=', 1)
        ->whereNotIn('id', $mainNewsIds)
        ->orderBy('created_at', 'asc')
        ->limit(4)
        ->get();


    return view('landing.news', [
      'highlight_talenta' => $highlightTalenta,
      'anugrah_talenta' => $anugrahTalenta,
      'ajang_talenta' => $ajangTalenta,
      'mainNews' =>$mainNews,
      'oldNews' => $oldNews,
      'moreNews' => $moreNews,
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
    })->sortByDesc('created_at')->take(4)->values()->all();
    $pedomanTeknis = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_PEDOMAN;
    })->sortByDesc('created_at')->take(4)->values()->all();
    $pustakaVideo = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_VIDEO;
    })->sortByDesc('created_at')->take(4)->values()->all();
    $pustakaAnugrah = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_ANUGRAH;
    })->sortByDesc('created_at')->take(4)->values()->all();
    $pustakaInfo = $pustaka->filter(function ($p) {
      return $p->type == Common::PUSTAKA_INFOGRAFIS;
    })->sortByDesc('created_at')->take(12)->values()->all();
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

public function viewNews($slug): View
{
    // Mendapatkan berita berdasarkan slug
    $model = News::where('slug', $slug)->firstOrFail();

    // Mengambil berita lain selain berita yang sedang dilihat
    $oldNews = News::query()
                ->where('id', '!=', $model->id) // Mengecualikan berita yang sedang dilihat
                ->orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

    return view('landing.view-berita', [
        'activeMenu' => 'news',
        'model' => $model,
        'oldNews' => $oldNews
    ]);
}
}
