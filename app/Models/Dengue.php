<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dengue extends Model
{
    use HasFactory;

    public function arbovirose()
    {
        return $this->morphOne(Arbovirose::class, 'arbovirosable');
    }

    public function dengue_sinals()
    {
        return $this->belongsToMany(DengueSinal::class, 'dengue_caso_sinals', 'dengue_id', 'dengue_sinal_id')
        ->withTimestamps();
    }

    public function dengue_doencas()
    {
        return $this->belongsToMany(DengueDoenca::class, 'dengue_caso_doencas', 'dengue_id', 'dengue_doenca_id')
        ->withTimestamps();
    }
}
