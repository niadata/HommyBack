<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\User;

class RepublicRequest extends FormRequest
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

    public function rules()
    {
        if ($this->isMethod('post')){
            return [
                'nameRepublic'=>'required|alpha',
                'email'=>'required|email|unique:users,email'.$this->locador->email,
                'email_verified_at'=>'required|string',
                'address'=>'required',
                'acessibility'=>'$request'|'alpha',
                'gender'=>'$request'|'alpha',
                'telephoneRepublic'=> '$request'|'min:11'|'numeric',

                ];
        }
        if ($this->isMethod('put')){
            return [
                'nameRepublic'=>'required|alpha',
                'email'=>'required|email|unique:users,email'.$this->locador->email,
                'email_verified_at'=>'required|string',
                'address'=>'required',
                'acessibility'=>'$request'|'alpha',
                'gender'=>'$request'|'alpha',
                'telephoneRepublic'=> '$request'|'min:11'|'numeric',

                ];
        }
    
    }
    public function messages(){
        return[
            // mensagenspersonalizadas para quando der erro
            'nameRepublic.alpha'=>'apenas caracteres de letras',
            'email.email'=>'email invalido',
            'email.unique'=>'email já cadastrado',
            'address'=>'endereço já cadastrado',
            'acessibility.alpha'=>'apenas sim ou não',
            'gender.alpha'=>'opção incompativel',
            'telephoneRepublic.numeric'=>'numero já cadastrado',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(),
        422));
    }

}
