<?php

namespace App\Enums;

enum TransportMode: string
{
    case Air = 'air';
    case Land = 'land';
    case Sea = 'sea';

    public static function toArray(): array
    {
        return [
            self::Air->value => 'Aéreo',
            self::Land->value => 'Terrestre',
            self::Sea->value => 'Marítimo',
        ];
    }
}