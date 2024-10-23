<?php

namespace App\Enums;

class TipoExposicaoRaiva
{
    const ARRANHAO = 'arranhao';
    const LAMBEDURA = 'lambedura';
    const MORDEDURA = 'mordedura';
    const CONTATO_INDIRETO = 'contato_indireto';

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