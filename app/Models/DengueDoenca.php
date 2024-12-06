<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DengueDoenca extends Model
{
    use HasFactory;

    public function dengue_doencas()
    {
        return $this->belongsToMany(Dengue::class, 'dengue_caso_doencas', 'dengue_doenca_id', 'dengue_id')
        ->withTimestamps();
    }
}
