<?php

namespace Modules\Lawyer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class kindRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|min:5|max:195',
                    'area_id' => 'required|exists:areas,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|min:5|max:195',
                    'area_id' => 'required|exists:areas,id',
                ];
            }
        }
    }

    public function attributes()
    {
        return[
            'name' => 'Nome da Classe Processual',
            'area_id' => 'Nome da Área'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'É necessário informar um :attribute',
            'name.min' => 'É necessário informar um :attribute com mínimo de 3 caracteres',
            'name.max' => 'É necessário informar um :attribute com máximo de 100 caracteres',
            'area_id.required' => 'É necessário informar um :attribute',
            'area_id.exists' => 'O :attribute não foi localizado no cadastro',
        ];
    }



    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
