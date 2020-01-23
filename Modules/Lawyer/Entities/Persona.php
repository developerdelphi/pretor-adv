<?php

namespace Modules\Lawyer\Entities;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $casts = ['id' => 'int', 'qualifications' => 'array'];
    protected $fillable = ['name', 'qualifications'];
    protected $appends = ['tipo', 'doc',];

    public function getTipoAttribute()
    {
        return data_get($this->qualifications, 'tipo', []);
    }

    public function getDocAttribute()
    {
        if(isset($this->qualifications['cpf']))
            return data_get($this->qualifications, 'cpf', []);
        elseif (isset($this->qualifications['cnpj']))
            return data_get($this->qualifications, 'cnpj', []);
        return null;
    }
}
