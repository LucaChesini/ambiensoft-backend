<?php

namespace App\Enums;

class SituacaoRiscoLeptospirose
{
    const AGUA_ENCHENTE = 1;
    const FOSSA_ESGOTO = 2;
    const RIO_LAGOA = 3;
    const TERRENO_BALDIO = 4;
    const CRIACAO_ANIMAIS = 5;
    const LOCAL_SINAIS_ROEDORES = 6;
    const ROEDORES_DIRETAMENTE = 7;
    const LIXO_ENTULHO = 8;
    const CAIXA_DAGUA = 9;
    const PLANTIO_COLHEITA = 10;
    const ARMAZENAMENTO_ALIMENTOS = 11;

    public static function getOptions()
    {
        return [
            self::AGUA_ENCHENTE => 'Água ou lama de enchente',
            self::FOSSA_ESGOTO => 'Fossa, caixa de gordura ou esgoto',
            self::RIO_LAGOA => 'Rio, córrego, lagoa ou represa',
            self::TERRENO_BALDIO => 'Terreno baldio',
            self::CRIACAO_ANIMAIS => 'Criação de animais',
            self::LOCAL_SINAIS_ROEDORES => 'Local com sinais de roedores',
            self::ROEDORES_DIRETAMENTE => 'Roedores diretamente',
            self::LIXO_ENTULHO => 'Lixo/entulho',
            self::CAIXA_DAGUA => 'Caixa d\'água',
            self::PLANTIO_COLHEITA => 'Plantio/colheita (lavoura)',
            self::ARMAZENAMENTO_ALIMENTOS => 'Armazenamento de grãos/alimentos',
        ];
    }
}