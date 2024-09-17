<?php

	namespace App\Http\Request;

	use Illuminate\Foundation\Http\FormRequest;
  use Illuminate\Http\Exceptions\HttpResponseException;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Validation\Rules\File;
  use Illuminate\Validation\ValidationException;

  class TalentaRequest extends FormRequest
	{
		public function rules(): array
		{
      return [
        'foto_talenta' => [
          File::types(['jpeg', 'jpg','png'])
            ->min(1)
            ->max(20 * 1024),
        ],
        'nama_talenta' => 'required',
        'bidang_id' => 'required',
        'lembaga_id' => 'required',
        'lembaga_unit_id' => 'required',
        'lembaga_induk_id' => 'required',
        'level_talenta_id' => 'required',
      ];
		}

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
      $errors = (new ValidationException($validator))->errors();

      throw new HttpResponseException(
        response()->json(['errors' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
      );
    }
	}
