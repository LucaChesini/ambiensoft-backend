<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChikungunyaDoenca extends Model
{
    use HasFactory;

    public function chikungunya_doencas()
    {
        return $this->belongsToMany(Dengue::class, 'chikungunya_caso_doencas', 'chikungunya_doenca_id', 'chikungunya_id')
        ->withTimestamps();
    }
}
