<?php

namespace App\Enums;

class Arboviroses
{
    const DENGUE = 'dengue';
    const CHIKUNGUNYA = 'chikungunya';

    public static function getOptions()
    {
        return [
            self::DENGUE => 'Dengue',
            self::CHIKUNGUNYA => 'Chikungunya'
        ];
    }
}