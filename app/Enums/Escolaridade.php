<?php

namespace App\Enums;

class Escolaridade
{
    const ANALFABETO = 0;
    const PRIMARIO_INCOMPLETO = 1;
    const PRIMARIO_COMPLETO = 2;
    const FUNDAMENTAL_INCOMPLETO = 3;
    const FUNDAMENTAL_COMPLETO = 4;
    const MEDIO_INCOMPLETO = 5;
    const MEDIO_COMPLETO = 6;
    const SUPERIOR_INCOMPLETO = 7;
    const SUPERIOR_COMPLETO = 8;
    const IGNORADO = 9;

    public static function getOptions()
    {
        return [
            self::ANALFABETO => 'Analfabeto',
            self::PRIMARIO_INCOMPLETO => '1ª a 4ª série incompleta',
            self::PRIMARIO_COMPLETO => '4ª série completa',
            self::FUNDAMENTAL_INCOMPLETO => '5ª a 8ª série incompleta',
            self::FUNDAMENTAL_COMPLETO => 'Ensino fundamental completo',
            self::MEDIO_INCOMPLETO => 'Ensino médio incompleto',
            self::MEDIO_COMPLETO => 'Ensino médio completo',
            self::SUPERIOR_INCOMPLETO => 'Ensino superior incompleto',
            self::SUPERIOR_COMPLETO => 'Educação superior completa',
            self::IGNORADO => 'Ignorado',
        ];
    }
}