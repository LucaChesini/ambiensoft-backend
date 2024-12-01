<?php

namespace App\Enums;

class LocalizacaoFerimento
{
    const MUCOSA = 1;
    const CABECA_PESCOCO = 2;
    const MAOS = 3;
    const PES = 4;
    const TRONCO = 5;
    const MEMBROS_SUPERIORES = 6;
    const MEMBROS_INFERIORES = 7;

    public static function getOptions()
    {
        return [
            self::MUCOSA => 'Mucosa',
            self::CABECA_PESCOCO => 'Cabeça/Pescoço',
            self::MAOS => 'Mãos',
            self::PES => 'Pés',
            self::TRONCO => 'Tronco',
            self::MEMBROS_SUPERIORES => 'Membros Superiores',
            self::MEMBROS_INFERIORES => 'Membros Inferiores'
        ];
    }
}