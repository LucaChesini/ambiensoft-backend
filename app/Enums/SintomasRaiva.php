<?php

namespace App\Enums;

class SintomasRaiva
{
    const AEROFOBIA = 'aerofobia';
    const PARALISIA = 'paralisia';
    const HIDROFOBIA = 'hidrofobia';
    const AGITACAO_PSICOMOTORA = 'agitacao_psicomotora';
    const DISFAGIA = 'disfagia';
    const FEBRE = 'febre';
    const PARESTESIA = 'parestesia';
    const AGRESSIVIDADE = 'agressividade';

    public static function getOptions()
    {
        return [
            self::AEROFOBIA => 'Aerofobia',
            self::PARALISIA => 'Paralisia',
            self::HIDROFOBIA => 'Hidrofobia',
            self::AGITACAO_PSICOMOTORA => 'Agitação Psicomotora',
            self::DISFAGIA => 'Disfagia',
            self::FEBRE => 'Febre',
            self::PARESTESIA => 'Parestesia',
            self::AGRESSIVIDADE => 'Agressividade'
        ];
    }
}