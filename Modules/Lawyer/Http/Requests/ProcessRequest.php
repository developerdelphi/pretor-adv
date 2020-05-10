<?php

namespace Modules\Lawyer\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'area_id' => 'required',
                    'kind_process.kind_id' => 'required',
                    'kind_process.entity_id' => 'required',
                    'name' =>'required',
                    'state' => 'required',
                ];
            }
            case 'PUT':
            case 'PATH':
            {
                return [
                    'name' => 'required',
                    'state' => 'required',
                ];
            }
            default:
                break;
        }
    }

    public function attributes()
    {
        return [
            'archivy' => 'Número do arquivo físico',
            'state' => 'Situação do Processo',
            'name' => 'Nome do Processo',
            'area_id' => 'Área Jurídica',
            'kind_process.kind_id' => 'Classe Processual',
            'kind_process.entity_id' => 'Entidade julgadora do processo',
        ];
    }

    public function messages()
    {
        return [
            'archivy.required' => 'É necessário informar um :attibute',
            'archivy.state' => 'É necessário informar um :attibute',
            'name.required' => 'Informe o :attribute',
            'area_id.required' => 'Informe informe a :attribute',
            'kind_process.kind_id.required' => 'Infomre no mínimo uma :attribute',
            'kind_process.entity_id.required' => 'Informe no mínimo uma :attribute',
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
