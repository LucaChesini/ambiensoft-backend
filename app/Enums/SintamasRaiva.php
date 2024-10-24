<?php

namespace App\Enums;

class TipoExposicaoRaiva
{
    const AEROFOBIA = 'aerofobia';
    const PARALISIA = 'paralisia';
    const HIDROFOBIA = 'hidrofobia';
    const AGITACAO_PSICOMOTORA = 'agitacao_psicomotora';

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