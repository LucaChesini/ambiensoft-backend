<?php

namespace App\Enums;

class TipoFerimento
{
    const PROFUNDO = 'profundo';
    const SUPERFICIAL = 'superficial';
    const DILACERANTE = 'dilacerante';

    public static function getOptions()
    {
        return [
            self::PROFUNDO => 'Profundo',
            self::SUPERFICIAL => 'Superficial',
            self::DILACERANTE => 'Dilacerante'
        ];
    }
}