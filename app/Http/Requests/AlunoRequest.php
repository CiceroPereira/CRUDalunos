<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlunoRequest extends FormRequest
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


        return [
            'nome'=>'required',
            'datanasc'=>'required|date', 
            'serie'=>'required', 
            'cep'=>'required', 
            'rua'=>'required',
            'numero'=>'required', 
            'bairro'=>'required', 
            'cidade'=>'required', 
            'estado'=>'required',
            'nomemae'=>'required', 
            'cpf'=>'required|cpf', 
            'datapag'=>'required|date'
            //
        ];
    }
}
