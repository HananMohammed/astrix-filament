<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self astrix_account()
 * @method static self client_account()
 */
class SfdaRegistration extends Enum

{

    protected static function values(): array
    {
        return [
            'astrix_account' => 1,
            'client_account' => 2,
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'Astrix Account',
            2 => 'Client Account',
        ];
    }


    protected static function labels(): array
    {
        return [
            'astrix_account' => 'Astrix Account',
            'client_account' => 'Client Account',
        ];
    }
}
