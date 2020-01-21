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
                    'name' =>'required',
                    'state' => 'required'

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
        ];
    }

    public function messages()
    {
        return [
            'archivy.required' => 'É necessário informar um :attibute',
            'archivy.state' => 'É necessário informar um :attibute'
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
