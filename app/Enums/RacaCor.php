<?php

namespace App\Enums;

class RacaCor
{
    const BRANCA = 1;
    const PRETA = 2;
    const AMARELA = 3;
    const PARDA = 4;
    const INDIGENA = 5;
    const IGNORADO = 9;

    public static function getOptions()
    {
        return [
            self::BRANCA => 'Branca',
            self::PRETA => 'Preta',
            self::AMARELA => 'Amarela',
            self::PARDA => 'Parda',
            self::INDIGENA => 'Indígena',
            self::IGNORADO => 'Ignorado',
        ];
    }
}