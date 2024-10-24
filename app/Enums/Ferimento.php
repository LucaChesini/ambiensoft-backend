<?php

namespace App\Enums;

class Ferimento
{
    const UNICO = 1;
    const MULTIPLO = 2;
    const SEM_FERIMENTO = 3;
    const IGNORADO = 9;

    public static function getOptions()
    {
        return [
            self::UNICO => 'Único',
            self::MULTIPLO => 'Múltiplo',
            self::SEM_FERIMENTO => 'Sem Ferimento',
            self::IGNORADO => 'Ignorado'
        ];
    }
}