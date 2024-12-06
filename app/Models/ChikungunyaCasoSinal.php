<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChikungunyaCasoSinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'chikungunya_id',
        'chikungunya_sinal_id'
    ];
}
