<?php

namespace App\Models;

use App\Enums\EspecieRaiva;
use App\Enums\Ferimento;
use App\Enums\LocalizacaoFerimento;
use App\Enums\TipoExposicaoRaiva;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raiva extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo_exposicao',
        'ferimento',
        'localizacao_ferimento',
        'especie_animal_agressor'
    ];

    public function zoonose()
    {
        return $this->morphOne(Zoonose::class, 'zoonosable');
    }

    public function raiva_sintomas()
    {
        return $this->belongsToMany(RaivaSintoma::class, 'raiva_caso_sintomas', 'raiva_id', 'raiva_sintoma_id')
        ->withTimestamps();
    }

    protected $appends = [
        'tipo_exposicao_descricao',
        'ferimento_descricao',
        'localizacao_ferimento_descricao',
        'especie_animal_agressor_descricao'
    ];

    public function getTipoExposicaoDescricaoAttribute(): ?string
    {
        $options = TipoExposicaoRaiva::getOptions();
        return $options[$this->tipo_exposicao] ?? null;
    }

    public function getFerimentoDescricaoAttribute(): ?string
    {
        $options = Ferimento::getOptions();
        return $options[$this->ferimento] ?? null;
    }

    public function getLocalizacaoFerimentoDescricaoAttribute(): ?string
    {
        $options = LocalizacaoFerimento::getOptions();
        return $options[$this->localizacao_ferimento] ?? null;
    }

    public function getEspecieAnimalAgressorDescricaoAttribute(): ?string
    {
        $options = EspecieRaiva::getOptions();
        return $options[$this->especie_animal_agressor] ?? null;
    }
}
