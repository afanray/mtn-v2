<?php

	namespace App\Http\Request;

	use Illuminate\Foundation\Http\FormRequest;
  use Illuminate\Http\Exceptions\HttpResponseException;
  use Illuminate\Http\JsonResponse;
  use Illuminate\Validation\ValidationException;

  class LembagaRequest extends FormRequest
	{
		public function rules(): array
		{
      $rules = [
        'name' => 'required',
        'province_id' => 'required',
        'regency_id' => 'required',
        'address' => 'required',
        'level' => 'required',
      ];
      if($this->request->get('level')){
        if($this->request->get('level') != 1){
          $rules['parent_id'] = 'required';
        }
      }
			return $rules;
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
