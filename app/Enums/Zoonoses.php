<?php

namespace App\Enums;

class Zoonoses
{
    const RAIVA = 'raiva';
    const LEPTOSPIROSE = 'leptospirose';

    public static function getOptions()
    {
        return [
            self::RAIVA => 'Raiva',
            self::LEPTOSPIROSE => 'Leptospirose'
        ];
    }
}