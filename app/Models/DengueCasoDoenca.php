<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DengueCasoDoenca extends Model
{
    use HasFactory;

    protected $fillable = [
        'dengue_id',
        'dengue_doenca_id'
    ];
}
