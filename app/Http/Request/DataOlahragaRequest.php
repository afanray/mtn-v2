<?php

	namespace App\Http\Request;

	use Illuminate\Foundation\Http\FormRequest;

	class DataOlahragaRequest extends FormRequest
	{
		public function rules(): array
		{
			return [
        'year' => 'required|numeric',
        'jml_pelatih_cabor_olimpiade' => 'numeric',
        'jml_pelatih_cabor_paralimpiade' => 'numeric',
        'jml_tenaga_or_sertifikasi_int' => 'numeric',
        'jml_atlet_dunia_olimpiade' => 'numeric',
        'jml_atlet_dunia_paralimpiade' => 'numeric',
        'jml_atlet_muda_dunia_olimpiade' => 'numeric',
        'jml_atlet_muda_dunia_paralimpiade' => 'numeric',
        'peringkat_olympic_games' => 'numeric',
        'peringkat_paralympic_games' => 'numeric',
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
        'jml_pelatih_cabor_olimpiade' => 'Jumlah Pelatih Cabor Olimpiade',
        'jml_pelatih_cabor_paralimpiade' => 'Jumlah Pelatih Cabor Paralimpeade',
        'jml_tenaga_or_sertifikasi_int' => 'Jumlah Tenaga Olahraga Sertifikasi Internasional',
        'jml_atlet_dunia_olimpiade' => 'Jumlah Atelet Dunia Olimpiade',
        'jml_atlet_dunia_paralimpiade' => 'Jumlah Atlet Dunia Paralimpiade',
        'jml_atlet_muda_dunia_olimpiade' => 'Jumlah Atlet Muda Olimpiade',
        'jml_atlet_muda_dunia_paralimpiade' => 'Jumlah Atelt Muda Paralimpiade',
        'peringkat_olympic_games' => 'Peringkat Olympic Games',
        'peringkat_paralympic_games' => 'Peringkat Paralympic Games',
      ];
    }
	}
