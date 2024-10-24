<?php

namespace App\Enums;

class TipoFerimento
{
    const PRE_EXPOSICAO = 'pre_exposicao';
    const POS_EXPOSICAO = 'pos_exposicao';

    public static function getOptions()
    {
        return [
            self::PRE_EXPOSICAO => 'Pré-exposição',
            self::POS_EXPOSICAO => 'Pós-exposição'
        ];
    }
}