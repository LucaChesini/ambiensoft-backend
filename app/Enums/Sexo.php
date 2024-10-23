<?php

namespace App\Enums;

class Sexo
{
    const MASCULINO = 'M';
    const FEMININO = 'F';
    const IGNORADO = 'I';

    public static function getOptions()
    {
        return [
            self::MASCULINO => 'Masculino',
            self::FEMININO => 'Feminino',
            self::IGNORADO => 'Ignorado',
        ];
    }
}