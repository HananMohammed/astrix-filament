<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self cap()
 * @method static self pump()
 * @method static self spray()
 * @method static self other()
 */
class PrimaryPackagingAccessories extends Enum

{

    protected static function values(): array
    {
        return [
            'cap' => 1,
            'pump' => 2,
            'spray' => 3,
            'other' => 4
        ];
    }

    protected static function labels(): array
    {
        return [
            'cap' => 'Cap',
            'pump' => 'Pump',
            'spray' => 'Spray',
            'other' => 'Other',
        ];
    }


    public static function toLabels(): array
    {
        return [
            1 => 'Cap',
            2 => 'Pump',
            3 => 'Spray',
            4 => 'Other',
        ];
    }

    public static function capOptions(): array
    {
        return [
            'flip_top_cap' => 'Flip Top Cap',
            'screw_cap' => 'Screw Cap',
            'desktop_cap' => 'Desktop Cap',
        ];
    }


    public static function PumpOptions(): array
    {
        return [
            'white' => 'white',
            'black' => 'black',
            'other' => 'other',
        ];
    }


    public static function getChildOptions($selectedOption): array
    {
        return match ((int)$selectedOption) {
            PrimaryPackagingAccessories::cap()->value => PrimaryPackagingAccessories::capOptions(),
            PrimaryPackagingAccessories::pump()->value => PrimaryPackagingAccessories::PumpOptions(),
            default => []
        };
    }

    public static function hideChild($selectedOption): bool
    {
        return (is_null($selectedOption) || in_array($selectedOption, [PrimaryPackagingAccessories::spray()->value, PrimaryPackagingAccessories::other()->value]));
    }
}
