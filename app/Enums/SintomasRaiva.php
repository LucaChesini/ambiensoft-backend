<?php

namespace App\Enums;

class SintomasRaiva
{
    const AEROFOBIA = 1;
    const PARALISIA = 2;
    const HIDROFOBIA = 3;
    const AGITACAO_PSICOMOTORA = 4;
    const DISFAGIA = 5;
    const FEBRE = 6;
    const PARESTESIA = 7;
    const AGRESSIVIDADE = 8;

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