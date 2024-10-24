<?php

namespace App\Enums;

class Confirmacao
{
    const SIM = 1;
    const NAO = 2;
    const IGNORADA = 9;

    public static function getOptions()
    {
        return [
            self::SIM => 'Sim',
            self::NAO => 'Não',
            self::IGNORADA => 'Ignorada'
        ];
    }
}