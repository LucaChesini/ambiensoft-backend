<?php

namespace App\Enums;

class SintomasLeptospirose
{
    const FEBRE = 1;
    const CONGESTAO_CONJUNTIVAL = 2;
    const ICTERICIA = 3;
    const HEMORRAGIA_PULMONAR = 4;
    const MIALGIA = 5;
    const DOR_NA_PANTURRILHA = 6;
    const INSUFICIENCIA_RENAL = 7;
    const OUTRAS_HEMORRAGIAS = 8;
    const CEFALIA = 9;
    const VOMITO = 10;
    const ALTERACOES_RESPIRATORIAS = 11;
    const MENINGISMO = 12;
    const PROSTRACAO = 13;
    const DIARREIA = 14;
    const ALTERACOES_CARDIACAS = 15;

    public static function getOptions()
    {
        return [
            self::FEBRE => 'Febre',
            self::CONGESTAO_CONJUNTIVAL => 'Congestão conjuntival',
            self::ICTERICIA => 'Icterícia',
            self::HEMORRAGIA_PULMONAR => 'Hemorragia pulmonar',
            self::MIALGIA => 'Mialgia',
            self::DOR_NA_PANTURRILHA => 'Dor na panturrilha',
            self::INSUFICIENCIA_RENAL => 'Insuficiência renal',
            self::OUTRAS_HEMORRAGIAS => 'Outras hemorragias',
            self::CEFALIA => 'Cefaleia',
            self::VOMITO => 'Vômito',
            self::ALTERACOES_RESPIRATORIAS => 'Alterações respiratórias',
            self::MENINGISMO => 'Meningismo',
            self::PROSTRACAO => 'Prostração',
            self::DIARREIA => 'Diarreia',
            self::ALTERACOES_CARDIACAS => 'Alterações cardíacas',
        ];
    }
}