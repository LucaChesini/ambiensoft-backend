<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rua extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome',
        'bairro_id'
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

    public function zoonoses()
    {
        return $this->hasMany(Zoonose::class);
    }

    public function arboviroses()
    {
        return $this->hasMany(Arbovirose::class);
    }
}
