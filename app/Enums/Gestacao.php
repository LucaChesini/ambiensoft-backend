<?php

namespace App\Enums;

class EspecieRaiva
{
    const PRIMEIRO_TRIMESTRE = 1;
    const SEGUNDO_TRIMESTRE = 2;
    const TERCEIRO_TRIMESTRE = 3;
    const IDADE_IGNORADA = 4;
    const NAO = 5;
    const NAO_APLICA = 6;
    const IGNORADA = 9;

    public static function getOptions()
    {
        return [
            self::PRIMEIRO_TRIMESTRE => '1° Trimestre',
            self::SEGUNDO_TRIMESTRE => '2° Trimestre',
            self::TERCEIRO_TRIMESTRE => '3° Trimestre',
            self::IDADE_IGNORADA => 'Idade gestacional ignorada',
            self::NAO => 'Não',
            self::NAO_APLICA => 'Não se aplica',
            self::IGNORADA => 'Ignorada',
        ];
    }
}