<?php

namespace App\Enums;

class LocalizacaoFerimento
{
    const MUCOSA = 'mucosa';
    const CABECA_PESCOCO = 'cabeca_pescoco';
    const MAOS = 'maos';
    const PES = 'pes';
    const TRONCO = 'tronco';
    const MEMBROS_SUPERIORES = 'membros_superiores';
    const MEMBROS_INFERIORES = 'membros_inferiores';

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