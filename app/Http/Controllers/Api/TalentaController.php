<?php

namespace App\Http\Controllers\Api;

use App\Models\Bidang;
use App\Models\Talenta;
use App\Models\LevelTalenta;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Request\TalentaRequest;
use App\Http\Resources\TalentaResource;

class TalentaController extends Controller
{
  public function index(Request $request)
  {
    $talenta = Talenta::query()->with(['lembaga_induk', 'lembaga_unit', 'lembaga', 'bidang'])
      ->simplePaginate(30);
    return $talenta;
  }

  public function getLevelTalenta(Request $request)
  {
    $bidang_id = $request->input('bidang_id');
    return LevelTalenta::query()->when($request->input('bidang_id'), function ($query) use ($bidang_id) {
      return $query->where('bidang_id', $bidang_id);
    })->simplePaginate(30);
  }

  public function store(TalentaRequest $request)
  {
    $model = new Talenta();
    $model->nama_talenta = $request->input('nama_talenta');
    $model->nik = $request->input('nik');
    $model->lembaga_induk_id = $request->input('lembaga_induk_id');
    $model->lembaga_unit_id = $request->input('lembaga_unit_id');
    $model->lembaga_id = $request->input('lembaga_id');
    $model->bidang_id = $request->input('bidang_id');
    $model->level_talenta_id = $request->input('level_talenta_id');
    if ($request->file('foto_talenta')) {
      $file = $request->file('foto_talenta');
      list($realName, $ext) = explode('.', $file->getClientOriginalName());
      $fileName = $realName . '_' . time() . random_int(1, 99) . '.' . $file->extension();
      $file->storeAs('public/talenta', $fileName);
      $model->foto_talenta = $fileName;
    }
    $model->save();
    return response()->json([
      'status' => 'success',
      'data' => $model
    ]);
  }

  public function countBidang()
  {

    if (ob_get_length()) {
      ob_clean(); // Bersihkan output buffer
    }


    $talentaCounts = DB::table('talenta')
      ->select('bidang_talenta', DB::raw('count(*) as total'))
      ->whereNotNull('bidang_talenta')
      ->groupBy('bidang_talenta')
      ->get();

    // Define mappings for images and descriptions
    $mappings = [
      "Riset dan Inovasi" => [
        "image" => "ic_risnov.jpeg",
        "deskripsi" => "Meningkatkan jumlah dan kualitas SDM Iptek nasional, berkontribusi pada inovasi, serta meningkatkan rekognisi internasional talenta riset dan inovasi melalui ajang dan portofolio."
      ],
      "Seni Budaya" => [
        "image" => "ic_senbud.jpeg",
        "deskripsi" => "Meningkatnya jumlah dan kualitas Talenta Seni Budaya yang kreatif, berkontribusi pada kebudayaan nasional, serta peningkatan rekognisi internasional dan penyelenggaraan ajang seni budaya berkelas internasional di Indonesia."
      ],
      "Olahraga" => [
        "image" => "ic_olahraga.jpeg",
        "deskripsi" => "Meningkatnya jumlah dan kualitas olahragawan berprestasi serta tenaga keolahragaan bersertifikat internasional, dengan peningkatan rekognisi dan raihan prestasi di cabang olahraga Olimpiade dan Paralimpiade."
      ]
    ];

    $response = $talentaCounts->map(function ($item) use ($mappings) {
      $bidang = $item->bidang_talenta;

      $mapping = $mappings[$bidang] ?? [
        "image" => "default_image.jpeg",
        "deskripsi" => "Deskripsi tidak tersedia."
      ];

      return [
        'bidang' => $bidang,
        'image' => $mapping['image'],
        'deskripsi' => $mapping['deskripsi'],
        'total' => $item->total
      ];
    });

    return response()->json($response->values(), 200, ['Content-Type' => 'application/json']);
  }

  // public function countBidang()
  // {
  //   $talentaCounts = DB::table('talenta')
  //     ->select('bidang_talenta', DB::raw('count(*) as total'))
  //     ->whereNotNull('bidang_talenta')
  //     ->groupBy('bidang_talenta')
  //     ->get();
  //   $mappings = [
  //     "Riset dan Inovasi" => [
  //       "image" => "ic_risnov.jpeg",
  //       "deskripsi" => "Meningkatkan jumlah dan kualitas SDM Iptek nasional, berkontribusi pada inovasi, serta meningkatkan rekognisi internasional talenta riset dan inovasi melalui ajang dan portofolio."
  //     ],
  //     "Seni Budaya" => [
  //       "image" => "ic_senbud.jpeg",
  //       "deskripsi" => "Meningkatnya jumlah dan kualitas Talenta Seni Budaya yang kreatif, berkontribusi pada kebudayaan nasional, serta peningkatan rekognisi internasional dan penyelenggaraan ajang seni budaya berkelas internasional di Indonesia."
  //     ],
  //     "Olahraga" => [
  //       "image" => "ic_olahraga.jpeg",
  //       "deskripsi" => "Meningkatnya jumlah dan kualitas olahragawan berprestasi serta tenaga keolahragaan bersertifikat internasional, dengan peningkatan rekognisi dan raihan prestasi di cabang olahraga Olimpiade dan Paralimpiade."
  //     ]
  //   ];

  //   // Customize response
  //   $response = $talentaCounts->groupBy('bidang_talenta')->map(function ($items, $categoryId) use ($mappings) {
  //     // Fallback if the category is not defined in the mappings
  //     $mapping = $mappings[$categoryId] ?? [
  //       "image" => "default_image.jpeg",
  //       "deskripsi" => "Deskripsi tidak tersedia."
  //     ];

  //     $total = $items->sum('total'); // Sum the total for this category

  //     return [
  //       'bidang' => $categoryId,
  //       'image' => $mapping['image'],
  //       'deskripsi' => $mapping['deskripsi'],
  //       'total' => $total
  //     ];
  //   });

  //   return response()->json($response->values());
  // }

  // function getCountTahapanBidang(Request $request)
  //   {
  //     $bidang = $request->get('_qb', 'Riset dan Inovasi');
  //     $bidangId = Bidang::where('name', $bidang)
  //         ->pluck('id')
  //         ->first();
  //     if (!$bidangId) {
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'tahapan' => []
  //         ], 404); 
  //     }
  //     $tahapanList = DB::table('level_talenta')
  //         ->select('id', 'name')
  //         ->where('bidang_id',$bidangId)
  //         ->get();
  //     $tahapanCounts = DB::table('talenta')
  //         ->join('level_talenta', 'talenta.level_talenta_id', '=', 'level_talenta.id') 
  //         ->select('level_talenta.id', DB::raw('count(*) as total'))
  //         ->where('talenta.bidang_id', $bidangId) 
  //         ->whereIn('level_talenta.id', $tahapanList->pluck('id'))
  //         ->groupBy('level_talenta.id')
  //         ->pluck('total', 'level_talenta.id') 
  //         ->toArray();
  //         $tahapan = $tahapanList->map(function ($item) use ($tahapanCounts, $bidang) {
  //             return [
  //                 'tahapan' => $item->name,
  //                 'image' => "{$item->name}_" . str_replace(' ', '', strtolower($bidang)) . ".svg",
  //                 'total' => $tahapanCounts[$item->id] ?? 0 // Default 0 jika tidak ada data
  //             ];
  //         });
  //         $data = [
  //             'bidang' => $bidang,
  //             'tahapan' => $tahapan
  //         ];
  //         return response()->json($data);
  //   }

  // function getCountTahapanBidang(Request $request)
  // {
  //     $bidang = $request->get('_qb', 'Riset dan Inovasi');
  //     $bidangId = Bidang::where('name', $bidang)
  //         ->pluck('id')
  //         ->first();

  //     if (!$bidangId) {
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'tahapan' => []
  //         ], 404); 
  //     }

  //     // Kategori umur berdasarkan tahapan
  //     $ageCategories = [
  //         'prabibit' => [6, 20],
  //         'bibit' => [10, 12],
  //         'potensial' => [12, 15],
  //         'unggul' => [15, 18],
  //     ];

  //     $tahapanCounts = [];
  //     foreach ($ageCategories as $tahapan => [$minAge, $maxAge]) {
  //         // Hitung jumlah berdasarkan kategori umur
  //         $count = DB::table('talenta')
  //             ->where('bidang_id', $bidangId)
  //              ->whereRaw("
  //                 TIMESTAMPDIFF(YEAR, 
  //                     IF(
  //                         STR_TO_DATE(tgl_lahir, '%d/%m/%Y') IS NOT NULL, 
  //                         STR_TO_DATE(tgl_lahir, '%d/%m/%Y'),
  //                         STR_TO_DATE(tgl_lahir, '%d-%m-%Y')
  //                     ), 
  //                     CURDATE()) 
  //                 BETWEEN ? AND ?
  //             ", [$minAge, $maxAge])
  //             ->count();

  //         $tahapanCounts[] = [
  //             'tahapan' => $tahapan,
  //             'image' => "{$tahapan}_" . str_replace(' ', '', strtolower($bidang)) . ".svg",
  //             'total' => $count
  //         ];
  //     }

  //     $data = [
  //         'bidang' => $bidang,
  //         'tahapan' => $tahapanCounts
  //     ];

  //     return response()->json($data);
  // }


  // function getCountTahapanBidang(Request $request)
  // {
  //     // Ambil bidang dari request atau default 'Riset dan Inovasi'
  //     $bidang = $request->get('_qb', 'Riset dan Inovasi');
  //     $bidangId = Bidang::where('name', $bidang)
  //         ->pluck('id')
  //         ->first();

  //     // Jika bidangId tidak ditemukan
  //     if (!$bidangId) {
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'tahapan' => []
  //         ], 404);
  //     }

  //     // Mapping kriteria umur berdasarkan bidangId
  //     $ageCategoriesByBidang = [
  //         1 => [  // Misalnya untuk bidangId = 1 (contoh Bidang Lain)
  //             'prabibit' => [5, 8],
  //             'bibit' => [9, 11],
  //             'potensi' => [11, 14],
  //             'unggul' => [16, 999]
  //         ],
  //         2 => [ 
  //             'prabibit' => [6, 9],
  //             'bibit' => [9, 12],
  //             'potensi' => [12, 18],
  //             'unggul' => [18, 999] // Umur lebih dari 18
  //         ],   
  //         3 => [  // Misalnya untuk bidangId = 1 (contoh Bidang Lain)
  //             'prabibit' => [6, 9],
  //             'bibit' => [10, 12],
  //             'potensi' => [13, 19],
  //             'unggul' => [20, 999]
  //         ],
  //     ];

  //     // Ambil kategori umur untuk bidangId yang sesuai
  //     $ageCategories = $ageCategoriesByBidang[$bidangId] ?? [];

  //     // Jika tidak ada kriteria umur untuk bidangId
  //     if (empty($ageCategories)) {
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'tahapan' => []
  //         ], 404);
  //     }

  //     // Ambil data pembinaan dan jaringan
  //     $pembinaanData = DB::table('riwayat_pembinaan')
  //         // ->where('bidang_id', $bidangId)
  //         ->get();

  //     // Menyimpan hasil perhitungan
  //     $tahapanCounts = [
  //         'prabibit' => 0,
  //         'bibit' => 0,
  //         'potensi' => 0,
  //         'unggul' => 0,
  //     ];

  //     // Menyaring talenta berdasarkan kategori umur, pembinaan, dan jaringan
  //     $rawTalenta = []; // Menyimpan raw talenta sesuai tahapan
  //     foreach ($ageCategories as $tahapan => [$minAge, $maxAge]) {
  //         foreach ($pembinaanData as $pembinaan) {
  //               $talentaQuery = DB::table('talenta')
  //                   ->join('riwayat_pembinaan', 'riwayat_pembinaan.talenta_id', '=', 'talenta.id')
  //                   ->where('talenta.bidang_id', $bidangId)
  //                   ->whereRaw("
  //                       TIMESTAMPDIFF(YEAR, 
  //                           IF(
  //                               STR_TO_DATE(tgl_lahir, '%d/%m/%Y') IS NOT NULL, 
  //                               STR_TO_DATE(tgl_lahir, '%d/%m/%Y'),
  //                               STR_TO_DATE(tgl_lahir, '%d-%m-%Y')
  //                           ), 
  //                           CURDATE()) 
  //                       BETWEEN ? AND ?
  //                   ", [$minAge, $maxAge])
  //                   ->whereIn('riwayat_pembinaan.category', is_array($pembinaan->category) ? $pembinaan->category : [$pembinaan->category])
  //                   ->whereIn('riwayat_pembinaan.competition_network', is_array($pembinaan->competition_network) ? $pembinaan->competition_network : [$pembinaan->competition_network]);

  //               $talentaList = $talentaQuery->get();
  //               $count = $talentaList instanceof \Illuminate\Support\Collection ? $talentaList->count() : 0;

  //               if ($count > 0) {
  //                   $tahapanCounts[$tahapan] += $count;
  //                   $rawTalenta[$tahapan] = $talentaList->toArray();
  //               }
  //           }

  //     }

  //     // Persiapkan hasil untuk dikembalikan
  //     $tahapanResults = [];
  //     foreach ($tahapanCounts as $tahapan => $count) {
  //         $tahapanResults[] = [
  //             'tahapan' => $tahapan,
  //             'image' => "{$tahapan}_" . str_replace(' ', '', strtolower($bidang)) . ".svg",
  //             'total' => $count,
  //             'raw_talenta' => $rawTalenta[$tahapan] ?? [] // Menyertakan raw talenta
  //         ];
  //     }

  //     // Jika ada permintaan untuk melihat raw data, kirimkan data tersebut
  //     if ($request->get('raw_data', false)) {
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'raw_talenta' => $rawTalenta
  //         ]);
  //     }

  //     // Kembalikan data tanpa raw talenta jika tidak ada permintaan raw_data
  //     return response()->json([
  //         'bidang' => $bidang,
  //         'tahapan' => $tahapanResults
  //     ]);
  // }


  // function getCountTahapanBidang(Request $request)
  //     {
  //         // Ambil bidang dari request atau default 'Riset dan Inovasi'
  //         $bidang = $request->get('_qb', 'Riset dan Inovasi');
  //         $bidangId = Bidang::where('name', $bidang)
  //             ->pluck('id')
  //             ->first();

  //         // Jika bidangId tidak ditemukan
  //         if (!$bidangId) {
  //             return response()->json([
  //                 'bidang' => $bidang,
  //                 'tahapan' => []
  //             ], 404);
  //         }

  //         // Mapping kriteria umur berdasarkan bidangId
  //         $ageCategoriesByBidang = [
  //             1 => [  // Misalnya untuk bidangId = 1 (contoh Bidang Lain)
  //                 'prabibit' => [5, 8],
  //                 'bibit' => [9, 11],
  //                 'potensi' => [11, 14],
  //                 'unggul' => [16, 999]
  //             ],
  //             2 => [ 
  //                 'prabibit' => [6, 9],
  //                 'bibit' => [9, 12],
  //                 'potensi' => [12, 18],
  //                 'unggul' => [18, 999] // Umur lebih dari 18
  //             ],   
  //             3 => [  // Misalnya untuk bidangId = 1 (contoh Bidang Lain)
  //                 'prabibit' => [6, 9],
  //                 'bibit' => [10, 12],
  //                 'potensi' => [13, 19],
  //                 'unggul' => [20, 999]
  //             ],
  //         ];

  //         // Ambil kategori umur untuk bidangId yang sesuai
  //         $ageCategories = $ageCategoriesByBidang[$bidangId] ?? [];

  //         // Jika tidak ada kriteria umur untuk bidangId
  //         if (empty($ageCategories)) {
  //             return response()->json([
  //                 'bidang' => $bidang,
  //                 'tahapan' => []
  //             ], 404);
  //         }

  //         // Ambil data pembinaan dan jaringan
  //         $pembinaanData = DB::table('riwayat_pembinaan')
  //             // ->where('bidang_id', $bidangId)
  //             ->get();

  //         // Menyimpan hasil perhitungan
  //         $tahapanCounts = [
  //             'prabibit' => 0,
  //             'bibit' => 0,
  //             'potensi' => 0,
  //             'unggul' => 0,
  //         ];

  //        $pembinaanData = DB::table('riwayat_pembinaan')->get();
  //       $allTalenta = DB::table('talenta')
  //           ->join('riwayat_pembinaan', 'riwayat_pembinaan.talenta_id', '=', 'talenta.id')
  //           ->where('talenta.bidang_id', $bidangId)
  //           ->get();

  //       $talentaCollection = collect($allTalenta);

  //       $tahapanResults = collect($ageCategories)->mapWithKeys(function ($ageRange, $tahapan) use ($talentaCollection, $pembinaanData) {
  //           [$minAge, $maxAge] = $ageRange;

  //           $filteredTalenta = $talentaCollection->filter(function ($talenta) use ($minAge, $maxAge, $pembinaanData) {

  //           $tanggal = $talenta->tgl_lahir;

  //           // Coba parsing dengan beberapa format
  //           $formats = ['d/m/Y', 'd-m-Y'];
  //           foreach ($formats as $format) {
  //               try {
  //                   $parsedDate = Carbon::createFromFormat($format, $tanggal);
  //                   break;
  //               } catch (\Exception $e) {
  //                   continue;
  //               }
  //           }

  //           if (!isset($parsedDate)) {
  //               throw new \Exception("Format tanggal tidak valid: $tanggal");
  //           }

  //           $age = $parsedDate->age;

  //               // $age = Carbon::parse($talenta->tgl_lahir)->age;
  //               $isWithinAge = $age >= $minAge && $age <= $maxAge;
  //               $isMatchingPembinaan = $pembinaanData->contains('talenta_id', $talenta->id);
  //               return $isWithinAge && $isMatchingPembinaan;
  //           });

  //           return [
  //               $tahapan => [
  //                   'total' => $filteredTalenta->count(),
  //                   'raw_talenta' => $filteredTalenta->values()->toArray(),
  //               ],
  //           ];
  //       })->toArray();


  //         // // Jika ada permintaan untuk melihat raw data, kirimkan data tersebut
  //         // if ($request->get('raw_data', false)) {
  //         //     return response()->json([
  //         //         'bidang' => $bidang,
  //         //         'raw_talenta' => $rawTalenta
  //         //     ]);
  //         // }

  //         // Kembalikan data tanpa raw talenta jika tidak ada permintaan raw_data
  //         return response()->json([
  //             'bidang' => $bidang,
  //             'tahapan' => $tahapanResults
  //         ]);
  //     }


  function getCountTahapanBidang(Request $request)
  {
    // Ambil bidang dari request atau default 'Riset dan Inovasi'
    $bidang = $request->get('_qb', 'Riset dan Inovasi');
    $bidangId = DB::table('bidang')->where('name', $bidang)->value('id');

    // Jika bidangId tidak ditemukan
    if (!$bidangId) {
      return response()->json([
        'bidang' => $bidang,
        'tahapan' => []
      ], 404);
    }

    // Mapping kriteria umur berdasarkan bidangId
    $ageCategoriesByBidang = [
      1 => ['prabibit' => [5, 8], 'bibit' => [9, 11], 'potensial' => [11, 14], 'unggul' => [16, 999]],
      2 => ['prabibit' => [6, 9], 'bibit' => [9, 12], 'potensial' => [12, 18], 'unggul' => [18, 999]],
      3 => ['prabibit' => [6, 9], 'bibit' => [10, 12], 'potensial' => [13, 19], 'unggul' => [20, 999]],
    ];

    // Ambil kategori umur untuk bidangId yang sesuai
    $ageCategories = $ageCategoriesByBidang[$bidangId] ?? [];

    // Jika tidak ada kriteria umur untuk bidangId
    if (empty($ageCategories)) {
      return response()->json([
        'bidang' => $bidang,
        'tahapan' => []
      ], 404);
    }

    // Ambil data talenta yang terkait dengan bidang dan riwayat pembinaan
    $talentaData = DB::table('talenta')
      ->join('riwayat_pembinaan', 'riwayat_pembinaan.talenta_id', '=', 'talenta.id')
      ->join('bidang', 'bidang.id', '=', 'talenta.bidang_id')
      ->join('province', 'province.id', '=', 'talenta.province_id')
      ->join('regencies', 'regencies.id', '=', 'talenta.regency_id')
      // ->join('histo', 'riwayat_pembinaan.talenta_id', '=', 'talenta.id')
      ->select('talenta.id', 'talenta.kode_talenta as talent_code', 'talenta.nama_talenta as talent_name', 'talenta.tgl_lahir as birthday', 'bidang.name as bidang', 'riwayat_pembinaan.category', 'riwayat_pembinaan.name as centra_name', 'riwayat_pembinaan.competition_network', 'province.code as province_code', 'province.name as province', 'regencies.code as regency_code', 'regencies.name as regency')
      ->where('talenta.bidang_id', $bidangId)
      ->get();

    // Menggunakan collect untuk memproses data talenta berdasarkan kategori umur
    $tahapanCounts = collect($ageCategories)->mapWithKeys(function ($range, $tahapan) use ($talentaData) {
      $filteredTalenta = $talentaData->filter(function ($talenta) use ($range) {
        try {
          $age = $this->calculateAge($talenta->birthday);
          return $age >= $range[0] && $age <= $range[1];
        } catch (\Exception $e) {
          return false;
        }
      });

      // return [$tahapan => $filteredTalenta->count()];
      return [$tahapan => [
        'count' => $filteredTalenta->count(),
        'raw_talenta' => $filteredTalenta->values()
      ]];
    });

    // Hasil akhir
    $result = $tahapanCounts->map(function ($data, $tahapan) use ($bidang) {
      return [
        'tahapan' => $tahapan,
        'image' => "{$tahapan}_" . str_replace(' ', '', strtolower($bidang)) . ".svg",
        'total' => $data['count'],
        'raw_talenta' => $data['raw_talenta']
      ];
    });

    return response()->json([
      'bidang' => $bidang,
      'tahapan' => $result->values()
    ]);
  }


  function calculateAge($tanggalLahir, $formats = ['d/m/Y', 'd-m-Y'])
  {
    foreach ($formats as $format) {
      try {
        $date = Carbon::createFromFormat($format, $tanggalLahir);
        return $date->age;
      } catch (\Exception $e) {
        continue;
      }
    }

    throw new \Exception("Format tanggal tidak valid: $tanggalLahir");
  }

  public function show(Request $request)
  {
    $talentaId = $request->get('_qid', "");
    $talenta = Talenta::find($talentaId);
    if (!$talenta) {
      return response()->json([
        'status' => 'error',
        'message' => 'Talenta not found'
      ], 404);
    }
    return new TalentaResource($talenta);
  }
}
