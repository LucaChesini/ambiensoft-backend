<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChikungunyaSinal extends Model
{
    use HasFactory;

    public function chikungunya_sinals()
    {
        return $this->belongsToMany(Dengue::class, 'chikungunya_caso_sinals', 'chikungunya_sinal_id', 'chikungunya_id')
        ->withTimestamps();
    }
}
