<?php

	namespace App\Http\Request;

	use Illuminate\Foundation\Http\FormRequest;

	class DataSeniBudayaRequest extends FormRequest
	{
		public function rules(): array
		{
			return [
        'year' => 'required|numeric',
        'jml_lulus_smk_b_seni' => 'numeric',
        'jml_lulus_smk_b_seni_kerja_seni' => 'numeric',
        'jml_lulus_pt_b_seni' => 'numeric',
        'jml_lulus_pt_b_seni_kerja_seni' => 'numeric',
        'jml_lembaga_sanggar_kom' => 'numeric',
        'jml_lembaga_sanggar_kom_aff' => 'numeric',
        'jml_karya_seni_budaya' => 'numeric',
        'jml_talenta_seni_budaya' => 'numeric',
        'jml_festival_pameran' => 'numeric',
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
        'jml_lulus_smk_b_seni' => 'Jumlah Lulusan SMK Bidang Seni',
        'jml_lulus_smk_b_seni_kerja_seni' => 'Jumlah Lulusan SMK Bidang Seni Kerja Seni',
        'jml_lulus_pt_b_seni' => 'Jumlah Lulusan PT Bidang Seni',
        'jml_lulus_pt_b_seni_kerja_seni' => 'Jumlah Lulusan PT Bidang Seni Kerja Seni',
        'jml_lembaga_sanggar_kom' => 'Jumlah Lembaga Sanggar Komunitas',
        'jml_lembaga_sanggar_kom_aff' => 'Jumlah Lembaga Sanggar Komunitas Terfasilitasi',
        'jml_karya_seni_budaya' => 'Jumlah Karya Seni Budaya',
        'jml_talenta_seni_budaya' => 'Jumlah Talenta Seni Budaya',
        'jml_festival_pameran' => 'Jumlah Festival Pameran',
      ];
    }
	}
