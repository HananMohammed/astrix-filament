<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self from_astrix_pharma()
 * @method static self from_client()
 */
class Barcode extends Enum

{

    protected static function values(): array
    {
        return [
            'from_astrix_pharma' => 1,
            'from_client' => 2,
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'From Astrix Pharma',
            2 => 'From Client',
        ];
    }


    protected static function labels(): array
    {
        return [
            'from_astrix_pharma' => 'From Astrix Pharma',
            'from_client' => 'From Client',
        ];
    }
}
