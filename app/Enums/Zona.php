<?php

namespace App\Enums;

class Zona
{
    const URBANA = 1;
    const RURAL = 2;
    const PERIURBANA = 3;
    const IGNORADO = 9;

    public static function getOptions()
    {
        return [
            self::URBANA => 'Urbana',
            self::RURAL => 'Rural',
            self::PERIURBANA => 'Periubana',
            self::IGNORADO => 'Ignorado'
        ];
    }
}