<?php

namespace App\Enums;

class TipoExposicaoRaiva
{
    const ARRANHAO = 1;
    const LAMBEDURA = 2;
    const MORDEDURA = 3;
    const CONTATO_INDIRETO = 4;

    public static function getOptions()
    {
        return [
            self::ARRANHAO => 'Arranhão',
            self::LAMBEDURA => 'Lambedura',
            self::MORDEDURA => 'Mordedura',
            self::CONTATO_INDIRETO => 'Contato Indireto',
        ];
    }
}