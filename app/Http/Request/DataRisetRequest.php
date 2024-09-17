<?php

	namespace App\Http\Request;

	use Illuminate\Foundation\Http\FormRequest;

	class DataRisetRequest extends FormRequest
	{
		public function rules(): array
		{
			return [
        'year' => 'required|numeric',
        'jml_penduduk' => 'numeric',
        'jml_dosen' => 'numeric',
        'jml_fungsional_peneliti' => 'numeric',
        'jml_fungsional_perekayasa' => 'numeric',
        'jml_dosen_s3' => 'numeric',
        'jml_fungsional_peniliti_s3' => 'numeric',
        'jml_fungsional_perekayasa_s3' => 'numeric',
        'cited_docs_indonesia' => 'numeric',
        'jml_paten_lisensi' => 'numeric',
        'jml_indexed_scientist' => 'numeric',
        'jml_pdbst_sd' => 'numeric',
        'jml_pdbst_smp' => 'numeric',
        'jml_pdbst_sma' => 'numeric',
        'jml_pdbst_dikti' => 'numeric',
        'jml_pdbst_diksus' => 'numeric',
			];
		}

		public function authorize(): bool
		{
			return true;
		}

    public function attributes(): array
    {
      return [
        'year' => 'Tahun',
        'jml_penduduk' => 'Jumlah Penduduk',
        'jml_dosen' => 'Jumlah Dosen',
        'jml_fungsional_peneliti' => 'Jumlah Fungsional Peneliti',
        'jml_fungsional_perekayasa' => 'Jumlah Fungsional Perekayasa',
        'jml_dosen_s3' => 'Jumlah Dosen S3',
        'jml_fungsional_peniliti_s3' => 'Jumlah Fungsional Peneliti S3',
        'jml_fungsional_perekayasa_s3' => 'Jumlah Fungsional Perekayasa S3',
        'cited_docs_indonesia' => 'Cited Document Indonesia',
        'jml_paten_lisensi' => 'Jumlah Paten yang Dilisensikan',
        'jml_indexed_scientist' => 'Jumlah SDM Iptek (Dosen, Peneliti & Perekayasa) yang masuk dalam pemeringkatan World’s Top 2% Scientist',
        'jml_pdbst_sd' => 'Jumlah Peserta Didik Berprestasi Riset dan Inovasi Tingkat SD/MI sederajat',
        'jml_pdbst_smp' => 'Jumlah Peserta Didik Berprestasi Riset dan Inovasi Tingkat SMP/MTs sederajat',
        'jml_pdbst_sma' => 'Jumlah Peserta Didik Berprestasi Riset dan Inovasi Tingkat SMA/SMK/MA/MAK sederajat',
        'jml_pdbst_dikti' => 'Jumlah Peserta Didik Berprestasi Riset dan Inovasi Tingkat Pendidikan Tinggi',
        'jml_pdbst_diksus' => 'Jumlah Peserta Didik Berprestasi Riset dan Inovasi Tingkat Pendidikan Khusus',
      ];
    }
	}
