<?php

namespace App\Enums;

class AnimaisPeconhentos
{
    const COBRA = 1;
    const ESCORPIAO = 2;
    const ARANHA = 3;
    const LAGARTA_URTICANTE = 4;

    public static function getOptions()
    {
        return [
            self::COBRA => 'Cobra',
            self::ESCORPIAO => 'Escorpião',
            self::ARANHA => 'Aranha',
            self::LAGARTA_URTICANTE => 'Lagarta urticante',
        ];
    }
}