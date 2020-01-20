<?php

namespace Modules\Lawyer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'origin'];

    public function kinds()
    {
        return $this->hasMany(Kind::class);
    }
}
