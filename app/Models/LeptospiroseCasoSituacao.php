<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeptospiroseCasoSituacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'leptospirose_id',
        'leptospirose_situacao_id'
    ];
}
