<?php

namespace Modules\Lawyer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Lawyer\Entities\Area;

class AreaRequest extends FormRequest
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
                    'name'  => 'required|min:4|max:100|unique:areas,name'
                    ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|min:4|max:100|unique:areas,name,'.$this->area->id
                ];
            }
            default:break;
        }
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */

    Public function attributes()
    {
        return[
            'name' => 'Nome da Área',
            // 'origin' => 'Origem da Área',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar um :attribute do Processo',
            'name.min' => 'É necessário informar um :attribute com mínimo de 3 caracteres',
            'name.max' => 'É necessário informar um :attribute com máximo de 100 caracteres',
            'name.unique' => 'O :attribute já existe no cadastro',
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
