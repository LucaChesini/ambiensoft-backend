<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeptospiroseSintoma extends Model
{
    use HasFactory;

    public function leptospirose_sintomas()
    {
        return $this->belongsToMany(Leptospirose::class, 'leptospirose_caso_sintomas', 'leptospirose_sintoma_id', 'leptospirose_id')
        ->withTimestamps();
    }
}
