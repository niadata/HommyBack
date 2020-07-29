<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')){
            return [
                'name'=>'required|alpha',
                'email'=>'required|email|unique:users,email'.$this->user->email,
                'email_verified_at'=>'required|string',
                'password'=>'required',
                'phone'=>'required|min:11|numeric',
                'cpf'=>'required|min:11|unique:users,cpf'.$this->user->cpf,
                ];
        }
        if ($this->isMethod('put')){
            return [
                'name'=>'required|alpha',
                'email'=>'required|email|unique:users,email'.$this->user->email,
                'email_verified_at'=>'required|string',
                'password'=>'required',
                'phone'=>'required|min:11|numeric',
                'cpf'=>'required|min:11|unique:users,cpf'.$this->user->cpf,
                ];
        }
        
    }
    public function messages(){
        return[
            // mensagenspersonalizadas para quando der erro
            'name.alpha'=>'apenas caracteres de letras',
            'email.email'=>'email invalido',
            'email.unique'=>'email já cadastrado',
            'password'=>'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }
}
