<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class Zoonose extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_notificacao',
        'doenca',
        'data_notificacao',
        'uf_notificacao',
        'municipio_notificacao',
        'codigo_ibge_notificacao',
        'unidade_saude',
        'codigo_unidade_saude',
        'data_primeiros_sintomas',
        'nome',
        'data_nascimento',
        'idade',
        'sexo',
        'gestante',
        'raca_cor',
        'escolaridade',
        'numero_sus',
        'nome_mae',
        'uf',
        'municipio_residencia',
        'codigo_ibge',
        'distrito',
        'bairro_id',
        'rua_id',
        'numero',
        'complemento',
        'geo_campo_1',
        'geo_campo_2',
        'ponto_referencia',
        'cep',
        'zona',
        'pais'
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }

    public function rua()
    {
        return $this->belongsTo(Rua::class);
    }
}
