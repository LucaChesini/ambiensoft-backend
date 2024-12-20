<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nome'
    ];

    public function ruas()
    {
        return $this->hasMany(Rua::class);
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
