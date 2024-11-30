<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Zoonose extends Model
{
    use HasFactory;

    protected $fillable = [
        'doenca',
        'data_notificacao',
        'unidade_saude',
        'data_primeiros_sintomas',
        'nome',
        'data_nascimento',
        'idade',
        'sexo',
        'numero_sus',
        'municipio_residencia',
        'bairro_id',
        'rua_id',
        'numero'
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

    public function rua()
    {
        return $this->belongsTo(Rua::class);
    }

    public function zoonosable()
    {
        return $this->morphTo();
    }
}
