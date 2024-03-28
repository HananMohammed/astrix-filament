<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self cosmetic()
 * @method static self food()
 */
class ProjectType extends Enum

{

    protected static function values(): array
    {
        return [
            'cosmetic' => 1,
            'food' => 2,
        ];
    }

    protected static function labels(): array
    {
        return [
            'cosmetic' => 'Cosmetic',
            'food' => 'Food',
        ];
    }
}
