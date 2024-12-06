<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DengueSinal extends Model
{
    use HasFactory;

    public function dengue_sinals()
    {
        return $this->belongsToMany(Dengue::class, 'dengue_caso_sinals', 'dengue_sinal_id', 'dengue_id')
        ->withTimestamps();
    }
}
