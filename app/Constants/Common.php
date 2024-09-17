<?php
namespace App\Constants;
use App\Models\Bidang;
use App\Models\BidangFokus;
use App\Models\Lembaga;
use App\Models\LevelTalenta;
use Illuminate\Database\Eloquent\Collection;

class Common {
  const BIDANG_RISET_ID = 1;
  const BIDANG_SENI_ID = 2;
  const BIDANG_OR_ID = 3;
  const STATUS_SUBMIT = 1;
  const STATUS_REJECT = 2;
  const STATUS_VALID = 3;
  const STATUS_NULL = 0;

  const TINGKAT_INTER = 1;
  const TINGKAT_NAS = 2;

  const PRIZES_TOP_SCIENTIST = 26;

  const TAHUN_LIST = [2021,2022,2023,2024];
  const FREQ_LIST = ['Tahunan','Dua Tahunan'];

  const PUSTAKA_KEBIJAKAN = 1;
  const PUSTAKA_PEDOMAN = 2;
  const PUSTAKA_VIDEO = 3;
  const PUSTAKA_INFOGRAFIS = 4;

  public static function getTingkat(): array{
    return [
      [
        'value'=>self::TINGKAT_INTER,
        'label'=>'Internasional',
      ],
      [
        'value'=>self::TINGKAT_NAS,
        'label'=>'Nasional',
      ],
    ];
  }
  public static function getTingkatLabel($tingkat): string{
    switch ($tingkat){
      case self::TINGKAT_INTER:
        return 'Internasional';
      case self::TINGKAT_NAS:
        return 'Nasional';
    }
    return 'Internasional';
  }
  public static function getBidang(): Collection{
    return Bidang::all();
  }
  public static function getBidangFokus(): Collection{
    return BidangFokus::all();
  }
  public static function getLembaga(): Collection{
    return Lembaga::all();
  }

  public static function getLevelTalenta(): Collection{
    return LevelTalenta::all();
  }

  public static function getPercentageTarget(int $target, ?int $val): float{
    if($val && $target){
      return round(($val / $target) * 100, 1);
    }
    return 0;
  }

//  public function
  public static function sasaranRiset(): array{
    return [
      [
        'id'=>1,
        'text'=>'Meningkatnya jumlah dan kualitas SDM Iptek nasional yang berkontribusi bagi kemajuan Iptek dan penciptaan inovasi nasional',
        'jumlahIndikator'=>4
      ],
      [
        'id'=>2,
        'text'=>'Meningkatnya rekognisi internasional Talenta di bidang Riset dan Inovasi berbasis ajang dan portofolio',
        'jumlahIndikator'=>3
      ],
    ];
  }
  public static function indikatorRiset(): array{
    return [
      [
        'id'=>1,
        'text'=>'Rasio SDM Iptek per 1 juta penduduk',
        'field'=>'rasio_sdm_iptek',
        'sasaran_id'=>1,
        'min'=>1151,
        'min_satuan' => 'a',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>4000,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>2,
        'text'=>'SDM Iptek Berkualifikasi S3',
        'field'=>'sdm_iptek_s3',
        'sasaran_id'=>1,
        'min'=>19.6,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>30,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>3,
        'text'=>'Jumlah Publikasi Internasional yang Disitasi',
        'sasaran_id'=>1,
        'field'=>'jml_publikasi_int_disitasi',
        'min'=>8409,
        'min_satuan' => 'c',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>30000,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>4,
        'text'=>'Jumlah Paten yang Dilisensikan',
        'sasaran_id'=>1,
        'field'=>'jml_paten_lisensi',
        'min'=>41,
        'min_satuan' => 'd',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>400,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>5,
        'text'=>'Raihan Olimpiade Sains dan Teknologi Dunia Tingkat Pelajar dan Mahasiswa',
        'sasaran_id'=>2,
        'field'=>'raihan_olimpiade_sains_tek',
        'min'=>100,
        'min_satuan' => 'e',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>1200,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>6,
        'text'=>'Jumlah SDM Iptek Masuk ke dalam Pemeringkatan World’s Top 2% Scientists',
        'sasaran_id'=>2,
        'field'=>'raihan_penghargaan_int',
        'min'=>95,
        'min_satuan' => 'f',
        'min_satuan_style' => 'sup',
        'min_subs' => '(kumulatif)',
        'max'=>200,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>7,
        'text'=>'Raihan Penghargaan Riset dan Inovasi Internasional',
        'sasaran_id'=>2,
        'field'=>'jml_sdm_iptek_top_sc',
        'min'=>'N/A',
        'min_satuan' => null,
        'min_satuan_style' => null,
        'min_subs' => null,
        'max'=>100,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
    ];
  }
  public static function indikatorRisetSasaran(int $sasaran_id): array{
    $indCollect = collect(self::indikatorRiset());
    return $indCollect->filter(function($v) use ($sasaran_id){
      return $v['sasaran_id'] === $sasaran_id;
    })->toArray();
  }

  public static function sasaranSeni(): array{
    return [
      [
        'id'=>1,
        'text'=>'Meningkatnya jumlah dan kualitas talenta seni budaya yang kreatif, kritis, konsisten berkarya, dan berkontribusi bagi pemajuan kebudayaan nasional',
        'jumlahIndikator'=>2
      ],
      [
        'id'=>2,
        'text'=>'Meningkatnya rekognisi internasional terhadap talenta seni budaya, serta penyelenggaraan ajang dan nonajang seni budaya berkelas internasional di Indonesia.',
        'jumlahIndikator'=>3
      ],
    ];
  }
  public static function indikatorSeni(): array{
    return [
      [
        'id'=>1,
        'text'=>'Persentase lulusan SMK/MAK dan Perguruan Tinggi (PT) bidang studi seni budaya yang bekerja di bidang seni budaya',
        'field'=>'presentase_lulusan_smk_pt_seni_budaya',
        'sasaran_id'=>1,
        'min'=>2.3,
        'min_satuan' => 'a',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>13.19,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => null,
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>2,
        'text'=>'Persentase lembaga, sanggar, komunitas seni budaya yang terfasilitasi untuk melakukan proses edukasi dan regenerasi talenta seni budaya secara berkelanjutan',
        'field'=>'presentase_lembaga_sanggar_kom_aff',
        'sasaran_id'=>1,
        'min'=>28,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>72,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => null,
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>3,
        'text'=>'Jumlah karya seni budaya yang memperoleh rekognisi di tingkat internasional',
        'sasaran_id'=>2,
        'field'=>'jml_karya_seni_budaya_rek_int',
        'min'=>9,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>369,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>4,
        'text'=>'Jumlah talenta seni budaya yang terlibat dalam kegiatan bereputasi baik di tingkat internasional',
        'sasaran_id'=>2,
        'field'=>'jml_talenta_seni_budaya_rek_int',
        'min'=>80,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>4002,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>5,
        'text'=>'Jumlah festival dan pameran seni budaya di dalam negeri yang memiliki jangkauan dan reputasi internasional',
        'sasaran_id'=>2,
        'field'=>'jml_festival_pameran_int',
        'min'=>21,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>117,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
    ];
  }
  public static function indikatorSeniSasaran(int $sasaran_id): array{
    $indCollect = collect(self::indikatorSeni());
    return $indCollect->filter(function($v) use ($sasaran_id){
      return $v['sasaran_id'] === $sasaran_id;
    })->toArray();
  }

  public static function sasaranOR(): array{
    return [
      [
        'id'=>1,
        'text'=>'Meningkatnya jumlah dan kualitas Olahragawan berprestasi di tingkat dunia dan Tenaga Keolahragaan bersertifikat internasional pada cabang olahraga Olimpiade dan Paralimpiade',
        'jumlahIndikator'=>4
      ],
      [
        'id'=>2,
        'text'=>'Meningkatnya rekognisi internasional dan raihan prestasi talenta Olahragawan Indonesia pada kejuaraan cabang olahraga Olimpiade dan Paralimpiade.',
        'jumlahIndikator'=>2
      ],
    ];
  }
  public static function indikatorOR(): array{
    return [
      [
        'id'=>1,
        'text'=>'Jumlah pelatih cabor Olimpiade dan Paralimpiade bersertifikasi internasional',
        'field'=>'jml_pelatih_sertifikasi_int',
        'sasaran_id'=>1,
        'min'=>'N/A',
        'min_satuan' => null,
        'min_satuan_style' => null,
        'min_subs' => null,
        'max'=>250,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>2,
        'text'=>'Jumlah tenaga keolahragaan lainnya bersertifikasi internasional',
        'field'=>'jml_tenaga_or_int',
        'sasaran_id'=>1,
        'min'=>186,
        'min_satuan' => 'a',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>1743,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>3,
        'text'=>'Jumlah atlet elit nasional level dunia pada cabor Olimpiade dan Paralimpiade unggulan',
        'sasaran_id'=>1,
        'field'=>'jml_atlet_elit_nas_dunia',
        'min'=>[98,36],
        'min_satuan' => ['atlet','paraatlet'],
        'min_satuan_style' => ['normal','normal'],
        'min_subs' => null,
        'max'=>[650,300],
        'max_satuan' => ['atlet','paraatlet'],
        'max_satuan_style' => ['normal','normal'],
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>4,
        'text'=>'Jumlah atlet usia muda level dunia pada cabor Olimpiade dan Paralimpiade unggulan',
        'sasaran_id'=>1,
        'field'=>'jml_atlet_muda_dunia',
        'min'=>[150,22],
        'min_satuan' => ['atlet','paraatlet'],
        'min_satuan_style' => ['normal','normal'],
        'min_subs' => null,
        'max'=>[3250,450],
        'max_satuan' => ['atlet','paraatlet'],
        'max_satuan_style' => ['normal','normal'],
        'max_subs' => '(kumulatif)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>5,
        'text'=>'Peringkat Olympic Games',
        'sasaran_id'=>2,
        'field'=>'peringkat_olympic_games',
        'min'=>55,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>5,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(Th. 2044)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
      [
        'id'=>6,
        'text'=>'Peringkat Paralympic Games',
        'sasaran_id'=>2,
        'field'=>'peringkat_paralympic_games',
        'min'=>55,
        'min_satuan' => 'b',
        'min_satuan_style' => 'sup',
        'min_subs' => null,
        'max'=>5,
        'max_satuan' => null,
        'max_satuan_style' => null,
        'max_subs' => '(Th. 2044)',
        'target'=>[
          2021=>1500,
          2022=>1500,
          2023=>1500,
          2024=>1500
        ]
      ],
    ];
  }
  public static function indikatorORSasaran(int $sasaran_id): array{
    $indCollect = collect(self::indikatorOR());
    return $indCollect->filter(function($v) use ($sasaran_id){
      return $v['sasaran_id'] === $sasaran_id;
    })->toArray();
  }

  public static function getTypePustaka(): array{
    return [
      [
        'value'=>self::PUSTAKA_KEBIJAKAN,
        'label'=>'Pustaka Kebijakan atau Regulasi Pemerintah'
      ],
      [
        'value'=>self::PUSTAKA_PEDOMAN,
        'label'=>'Pustaka Pedoman atau Panduan Teknis'
      ],
      [
        'value'=>self::PUSTAKA_VIDEO,
        'label'=>'Pustaka Video'
      ],
      [
        'value'=>self::PUSTAKA_INFOGRAFIS,
        'label'=>'Pustaka Informasi Visual dalam Bentuk Infografis'
      ],
    ];
  }

  public static function getTahun(): array{
    return [
      [
        'label'=>'Transformasi',
        'data'=>[
          2023,2024
        ]
      ],
      [
        'label'=>'Penguatan Pelaksanaan',
        'data'=>[
          2025,2026,2027,2028,2029
        ]
      ],
      [
        'label'=>'Pemantapan',
        'data'=>[
          2030,2031,2032,2033,2034
        ]
      ],
      [
        'label'=>'Keberlanjutan',
        'data'=>[
          2035,2036,2037,2038,2039
        ]
      ],
      [
        'label'=>'Peraihan Hasil',
        'data'=>[
          2040,2041,2042,2043,2044,2045
        ]
      ],
    ];
  }
}

