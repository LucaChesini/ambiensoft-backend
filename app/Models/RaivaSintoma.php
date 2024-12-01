<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RaivaSintoma extends Model
{
    use HasFactory;

    public function raiva_sintomas()
    {
        return $this->belongsToMany(Raiva::class, 'raiva_caso_sintomas', 'raiva_sintoma_id', 'raiva_id')
        ->withTimestamps();
    }
}
