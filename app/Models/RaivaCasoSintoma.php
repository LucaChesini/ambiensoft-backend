<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaivaCasoSintoma extends Model
{
    use HasFactory;

    protected $fillable = [
        'raiva_id',
        'raiva_sintoma_id'
    ];
}
