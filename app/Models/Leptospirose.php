<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leptospirose extends Model
{
    use HasFactory;

    public function zoonose()
    {
        return $this->morphOne(Zoonose::class, 'zoonosable');
    }

    public function leptospirose_sintomas()
    {
        return $this->belongsToMany(LeptospiroseSintoma::class, 'leptospirose_caso_sintomas', 'leptospirose_id', 'leptospirose_sintoma_id')
        ->withTimestamps();
    }

    public function leptospirose_situacaos()
    {
        return $this->belongsToMany(LeptospiroseSituacao::class, 'leptospirose_caso_situacaos', 'leptospirose_id', 'leptospirose_situacao_id')
        ->withTimestamps();
    }
}
