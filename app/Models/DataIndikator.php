<?php

	namespace App\Models;

	use Illuminate\Database\Eloquent\Model;

	class DataIndikator extends Model
	{
    protected $table = 'data_indikator';
    protected $fillable = [
      'year',
      'is_baseline',
      'rasio_sdm_iptek',
      'sdm_iptek_s3',
      'jml_publikasi_int_disitasi',
      'jml_paten_lisensi',
      'jml_sdm_iptek_top_sc',
      'presentase_lulusan_smk_pt_seni_budaya',
      'presentase_lembaga_sanggar_kom_aff',
      'raihan_penghargaan_int',
      'raihan_olimpiade_sains_tek',
      'lulusan_smk_pt_seni_budaya',
      'lembaga_komunitas_aff',
      'jml_karya_seni_budaya_rek_int',
      'jml_talenta_seni_budaya_rek_int',
      'jml_festival_pameran_int',
      'jml_pelatih_sertifikasi_int',
      'jml_tenaga_or_int',
      'jml_atlet_elit_nas_dunia',
      'jml_atlet_muda_dunia',
      'peringkat_olympic_games',
      'peringkat_paralympic_games',
    ];

    public static function calculateIndikatorRiset(int $year): void{
      $data = DataDasar::query()->where('year','=',$year)->first();
      $ht = HighLightTalenta::query()
        ->join('ref_prizes','highlight_talenta.ref_prizes_id','=','ref_prizes.id')
        ->where('highlight_talenta.tahun',$year);
      $sdm_iptek_top_sc = $ht->where('highlight_talenta.ref_prizes_id',\App\Constants\Common::PRIZES_TOP_SCIENTIST)->get();
      $prizes_int = $ht->where('ref_prizes.tingkat', \App\Constants\Common::TINGKAT_INTER)->get();
      if($data){
        $jml_dosen = $data->jml_dosen ?? 0;
        $jml_fungsional_peneliti = $data->jml_fungsional_peneliti ?? 0;
        $jml_fungsional_perekayasa = $data->jml_fungsional_perekayasa ?? 0;
        $jml_penduduk = $data->jml_penduduk ?? 0;
        $jml_dosen_s3 = $data->jml_dosen_s3 ?? 0;
        $jml_fungsional_peniliti_s3 = $data->jml_fungsional_peniliti_s3 ?? 0;
        $jml_fungsional_perekayasa_s3 = $data->jml_fungsional_perekayasa_s3 ?? 0;
        $cited_docs_indonesia = $data->cited_docs_indonesia ?? 0;
        $jml_paten_lisensi = $data->jml_paten_lisensi ?? 0;
        $jml_pdbst_sd = $data->jml_pdbst_sd ?? 0;
        $jml_pdbst_smp = $data->jml_pdbst_smp ?? 0;
        $jml_pdbst_sma = $data->jml_pdbst_sma ?? 0;
        $jml_pdbst_dikti = $data->jml_pdbst_dikti ?? 0;
        $jml_pdbst_diksus = $data->jml_pdbst_diksus ?? 0;
        $model = DataIndikator::query()->where('year','=',$year)->first();
        if(empty($model)){
          $model = new self();
          $model->year = $year;
        }
        $model->is_baseline = true;
        $model->rasio_sdm_iptek = ($jml_dosen + $jml_fungsional_peneliti + $jml_fungsional_perekayasa) / ( $jml_penduduk / 1000000);
        $model->sdm_iptek_s3 = (($jml_dosen_s3 + $jml_fungsional_peniliti_s3 + $jml_fungsional_perekayasa_s3) / ($jml_dosen + $jml_fungsional_peneliti + $jml_fungsional_perekayasa)) * 100;
        $model->jml_publikasi_int_disitasi = $cited_docs_indonesia;
        $model->jml_paten_lisensi = $jml_paten_lisensi;
        $model->raihan_olimpiade_sains_tek = ($jml_pdbst_sd + $jml_pdbst_smp + $jml_pdbst_sma + $jml_pdbst_dikti + $jml_pdbst_diksus);
        $model->jml_sdm_iptek_top_sc = $sdm_iptek_top_sc ? count($sdm_iptek_top_sc) : 0;
        $model->raihan_penghargaan_int = $prizes_int ? count($prizes_int) : 0;
        $model->save();
      }
    }
    public static function calculateIndikatorSeniBudaya(int $year): void{
      $data = DataDasarSb::query()->where('year','=',$year)->first();
      $jml_lulus_smk_b_seni = $data->jml_lulus_smk_b_seni ?? 0;
      $jml_lulus_smk_b_seni_kerja_seni = $data->jml_lulus_smk_b_seni_kerja_seni ?? 0;
      $jml_lulus_pt_b_seni = $data->jml_lulus_pt_b_seni ?? 0;
      $jml_lulus_pt_b_seni_kerja_seni = $data->jml_lulus_pt_b_seni_kerja_seni ?? 0;
      $jml_lembaga_sanggar_kom = $data->jml_lembaga_sanggar_kom ?? 0;
      $jml_lembaga_sanggar_kom_aff = $data->jml_lembaga_sanggar_kom_aff ?? 0;
      $jml_karya_seni_budaya = $data->jml_karya_seni_budaya ?? 0;
      $jml_talenta_seni_budaya = $data->jml_talenta_seni_budaya ?? 0;
      $jml_festival_pameran = $data->jml_festival_pameran ?? 0;
      $model = DataIndikator::query()->where('year','=',$year)->first();
      if(empty($model)){
        $model = new self();
        $model->year = $year;
      }
      $model->is_baseline = true;
      $model->presentase_lulusan_smk_pt_seni_budaya = (($jml_lulus_smk_b_seni_kerja_seni + $jml_lulus_pt_b_seni_kerja_seni) / ($jml_lulus_smk_b_seni + $jml_lulus_pt_b_seni)) * 100;
      $model->presentase_lembaga_sanggar_kom_aff = ($jml_lembaga_sanggar_kom_aff / $jml_lembaga_sanggar_kom) * 100;
      $model->jml_talenta_seni_budaya_rek_int = $jml_talenta_seni_budaya;
      $model->jml_karya_seni_budaya_rek_int = $jml_karya_seni_budaya;
      $model->jml_festival_pameran_int = $jml_festival_pameran;
      $model->save();
    }
    public static function calculateIndikatorOlahraga(int $year): void{
      $data = DataDasarOr::query()->where('year','=',$year)->first();
      $jml_pelatih_cabor_olimpiade = $data->jml_pelatih_cabor_olimpiade ?? 0;
      $jml_pelatih_cabor_paralimpiade = $data->jml_pelatih_cabor_paralimpiade ?? 0;
      $jml_tenaga_or_sertifikasi_int = $data->jml_tenaga_or_sertifikasi_int ?? 0;
      $jml_atlet_dunia_olimpiade = $data->jml_atlet_dunia_olimpiade ?? 0;
      $jml_atlet_dunia_paralimpiade = $data->jml_atlet_dunia_paralimpiade ?? 0;
      $jml_atlet_muda_dunia_olimpiade = $data->jml_atlet_muda_dunia_olimpiade ?? 0;
      $jml_atlet_muda_dunia_paralimpiade = $data->jml_atlet_muda_dunia_paralimpiade ?? 0;
      $peringkat_olympic_games = $data->peringkat_olympic_games ?? 0;
      $peringkat_paralympic_games = $data->peringkat_paralympic_games ?? 0;
      $model = DataIndikator::query()->where('year','=',$year)->first();
      if(empty($model)){
        $model = new self();
        $model->year = $year;
      }
      $model->is_baseline = true;
      $model->jml_pelatih_sertifikasi_int = $jml_pelatih_cabor_olimpiade + $jml_pelatih_cabor_paralimpiade;
      $model->jml_tenaga_or_int = $jml_tenaga_or_sertifikasi_int;
      $model->jml_atlet_elit_nas_dunia = $jml_atlet_dunia_olimpiade + $jml_atlet_dunia_paralimpiade;
      $model->jml_atlet_muda_dunia = $jml_atlet_muda_dunia_olimpiade + $jml_atlet_muda_dunia_paralimpiade;
      $model->peringkat_olympic_games = $peringkat_olympic_games;
      $model->peringkat_paralympic_games = $peringkat_paralympic_games;
      $model->save();
    }
	}
