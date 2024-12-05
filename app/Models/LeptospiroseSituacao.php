<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeptospiroseSituacao extends Model
{
    use HasFactory;

    public function leptospirose_situacaos()
    {
        return $this->belongsToMany(Leptospirose::class, 'leptospirose_caso_situacaos', 'leptospirose_situacao_id', 'leptospirose_id')
        ->withTimestamps();
    }
}
