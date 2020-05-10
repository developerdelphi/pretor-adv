<?php

namespace Modules\Lawyer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityRequest extends FormRequest
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
                    'name'  => 'required|min:4|max:195|unique:entities,name'
                    ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|min:4|max:195|unique:entities,name,'.$this->entity->id
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
            'name' => 'Nome da Entidade',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'É necessário informar um :attribute',
            'name.min' => 'É necessário informar um :attribute com mínimo de 3 caracteres',
            'name.max' => 'É necessário informar um :attribute com máximo de 195 caracteres',
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
