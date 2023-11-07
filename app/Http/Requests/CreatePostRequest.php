<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            'category_id' => ['exists:categories,id']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'category_id.exists' => 'A categoria não existe ou não está cadastrada',

        ];
    }

    public function failedValidation(Validator $validator) {
        $errors = $validator->errors()->toArray();
        $data = [];
        foreach($errors as $key => $error) {
            $data[$key] = $error[0];
        }
       throw new HttpResponseException(response()->json($data, 400));
   }
}
