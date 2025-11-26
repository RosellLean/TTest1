<?php

namespace App\Enums;

enum TicketType: int
{
    case Type_1 = 1;
    case Type_2 = 2;
    case Type_3 = 3;

    public static function toArray(): array
    {
        return [
            self::Type_1->value => 'Tipo 1',
            self::Type_2->value => 'Tipo 2',
            self::Type_3->value => 'Tipo 3',
        ];
    }
}