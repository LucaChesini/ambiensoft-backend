<?php

namespace App\Enums;

class EspecieRaiva
{
    const CANINA = 1;
    const FELINA = 2;
    const QUIROPTERA = 3;
    const PRIMATA = 4;
    const RAPOSA = 5;
    const HERBIVORA = 6;
    const IGNORADA = 9;

    public static function getOptions()
    {
        return [
            self::CANINA => 'Canina',
            self::FELINA => 'Felina',
            self::QUIROPTERA => 'Quiróptera',
            self::PRIMATA => 'Primata',
            self::RAPOSA => 'Raposa',
            self::HERBIVORA => 'Herbívora',
            self::IGNORADA => 'Ignorada'
        ];
    }
}