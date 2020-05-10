<?php

namespace Modules\Lawyer\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Process extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'archivy', 'state', 'situation'];

    public function kinds()
    {
        return $this->belongsToMany(Kind::class);
    }
}
