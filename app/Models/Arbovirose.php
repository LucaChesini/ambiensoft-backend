<?php

namespace App\Models;

use App\Enums\Arboviroses;
use App\Enums\Sexo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arbovirose extends Model
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

    protected $appends = [
        'doenca_descricao',
        'sexo_descricao'
    ];

    public function bairro()
    {
        return $this->belongsTo(Bairro::class);
    }
    
    public function rua()
    {
        return $this->belongsTo(Rua::class);
    }
    
    public function arbovirosable()
    {
        return $this->morphTo();
    }

    public function getDoencaDescricaoAttribute(): ?string
    {
        $options = Arboviroses::getOptions();
        return $options[$this->doenca] ?? null;
    }

    public function getSexoDescricaoAttribute(): ?string
    {
        $options = Sexo::getOptions();
        return $options[$this->sexo] ?? null;
    }
}
