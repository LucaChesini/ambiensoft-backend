<?php

namespace App\Enums;

class SinaisClinicos
{
    const FEBRE = 1;
    const MIALGIA = 2;
    const CEFALEIA = 3;
    const EXANTEMA = 4;
    const VOMITO = 5;
    const NAUSEAS = 6;
    const DOR_NAS_COSTAS = 7;
    const CONJUNTIVITE = 8;
    const ARTRITE = 9;
    const ARTRALGIA_INTENSA = 10;
    const DOR_RETROORBITAL = 11;

    public static function getOptions()
    {
        return [
            self::FEBRE => 'Febre',
            self::MIALGIA => 'Mialgia',
            self::CEFALEIA => 'Cefaleia',
            self::EXANTEMA => 'Exantema',
            self::VOMITO => 'Vômito',
            self::NAUSEAS => 'Náuseas',
            self::DOR_NAS_COSTAS => 'Dor nas costas',
            self::CONJUNTIVITE => 'Conjuntivite',
            self::ARTRITE => 'Artrite',
            self::ARTRALGIA_INTENSA => 'Artralgia intensa',
            self::DOR_RETROORBITAL => 'Dor retroorbital'
        ];
    }
}