<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChikungunyaCasoDoenca extends Model
{
    use HasFactory;

    protected $fillable = [
        'chikungunya_id',
        'chikungunya_doenca_id'
    ];
}
