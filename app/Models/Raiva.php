<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiva extends Model
{
    use HasFactory;

    protected $fillable = [
        
    ];

    public function zoonose()
    {
        return $this->morphOne(Zoonose::class, 'zoonosable');
    }

    public function raiva_sintomas()
    {
        return $this->belongsToMany(RaivaSintoma::class, 'raiva_caso_sintomas', 'raiva_id', 'raiva_sintoma_id')
        ->withTimestamps();
    }
}
