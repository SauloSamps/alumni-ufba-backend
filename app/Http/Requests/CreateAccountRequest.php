<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Rules\CheckUserUFBARule;

class CreateAccountRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string'],
            'cpf' => [
                'required',
                'unique:users,cpf',
                'string',
                new CheckUserUFBARule
            ],
            'course_id' => ['required','exists:courses,id'],
            'grad_year' => ['integer'],
            'city' => ['string'],
            'state' => ['string'],
            'country' => ['string'],
            'description' => ['string'],

        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'email.unique' => 'O email já está cadastrado',
            'cpf.unique' => 'O CPF já está cadastrado',
            'course_id.exists' => 'O curso não existe ou não está cadastrado no sistema',

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
