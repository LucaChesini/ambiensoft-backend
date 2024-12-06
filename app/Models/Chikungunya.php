<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chikungunya extends Model
{
    use HasFactory;

    public function arbovirose()
    {
        return $this->morphOne(Arbovirose::class, 'arbovirosable');
    }

    public function chikungunya_sinals()
    {
        return $this->belongsToMany(ChikungunyaSinal::class, 'chikungunya_caso_sinals', 'chikungunya_id', 'chikungunya_sinal_id')
        ->withTimestamps();
    }

    public function chikungunya_doencas()
    {
        return $this->belongsToMany(ChikungunyaDoenca::class, 'chikungunya_caso_doencas', 'chikungunya_id', 'chikungunya_doenca_id')
        ->withTimestamps();
    }
}
