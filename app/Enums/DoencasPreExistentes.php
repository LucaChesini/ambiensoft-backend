<?php

namespace App\Enums;

class DoencasPreExistentes
{
    const DIABETES = 1;
    const DOENCAS_HEMATOLOGICAS = 2;
    const HEPATOPATIAS = 3;
    const DOENCA_RENAL_CRONICA = 4;
    const HIPERTENSAO_ARTERIAL = 5;
    const DOENCA_ACIDO_PEPTICA = 6;
    const DOENCAS_AUTO_IMUNES = 7;

    public static function getOptions()
    {
        return [
            self::DIABETES => 'Diabetes',
            self::DOENCAS_HEMATOLOGICAS => 'Doenças hematológicas',
            self::HEPATOPATIAS => 'Hepatopatias',
            self::DOENCA_RENAL_CRONICA => 'Doença renal crônica',
            self::HIPERTENSAO_ARTERIAL => 'Hipertensão arterial',
            self::DOENCA_ACIDO_PEPTICA => 'Doença ácido-péptica',
            self::DOENCAS_AUTO_IMUNES => 'Doenças auto-imunes'
        ];
    }
}