<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DengueCasoSinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'dengue_id',
        'dengue_sinal_id'
    ];
}
