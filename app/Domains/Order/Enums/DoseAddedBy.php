<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self client()
 * @method static self r_and_d()
 */
class DoseAddedBy extends Enum

{

    protected static function values(): array
    {
        return [
            'client' => 1,
            'r_and_d' => 2,
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'Client',
            2 => 'R&D',
        ];
    }


    protected static function labels(): array
    {
        return [
            'client' => 'Client',
            'r_and_d' => 'R&D',
        ];
    }
}
