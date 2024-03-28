<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self rejected()
 * @method static self pre_order()
 * @method static self order()
 */
class ProcessStep extends Enum
{
    protected static function values(): array
    {
        return [
            'rejected' => 0,
            'pre_order' => 1,
            'order' => 2,
        ];
    }

    protected static function labels(): array
    {
        return [
            'rejected' => 'Rejected',
            'pre_order' => 'Pre Order',
            'order' => 'Order',
        ];
    }

    public static function getColor($step): string
    {
        return match ($step) {
            'Rejected' => 'danger',
            'Pre Order' => 'primary',
            'Order' => 'success',
        };
    }

    public static function steps(): array
    {
        return [
            0 => 'Rejected',
            1 => 'Pre Order',
            2 => 'Order',
        ];
    }
}
