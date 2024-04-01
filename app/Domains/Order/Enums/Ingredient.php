<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self english_only()
 * @method static self arabic_only()
 * @method static self english_and_arabic()
 */
class Ingredient extends Enum

{

    protected static function values(): array
    {
        return [
            'english_only' => 1,
            'arabic_only' => 2,
            'english_and_arabic' => 3,
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'English Only',
            2 => 'Arabic Only',
            3 => 'English And Arabic',
        ];
    }


    protected static function labels(): array
    {
        return [
            'english_only' => 'English Only',
            'arabic_only' => 'Arabic Only',
            'english_and_arabic' => 'English And Arabic',
        ];
    }
}
