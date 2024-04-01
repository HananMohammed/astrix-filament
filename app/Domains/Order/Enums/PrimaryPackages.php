<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self jar()
 * @method static self bottle()
 * @method static self tube()
 * @method static self sachets()
 */
class PrimaryPackages extends Enum

{

    protected static function values(): array
    {
        return [
            'jar' => 1,
            'bottle' => 2,
            'tube' => 3,
            'sachets' => 4
        ];
    }

    protected static function labels(): array
    {
        return [
            'jar' => 'Jar',
            'bottle' => 'Bottle',
            'tube' => 'Tube',
            'sachets' => 'Sachets',
        ];
    }

    public static function labelDescriptions(): array
    {
        return [
            1 => 'Dimension : 35*35',
            2 => 'Dimension : 35*35',
            3 => 'Dimension : 35*35',
            4 => 'Dimension : 35*35'
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'Jar',
            2 => 'Bottle',
            3 => 'Tube',
            4 => 'Sachets',
        ];
    }

    public static function jarOrBottleOptions(): array
    {
        return [
            'plastic' => 'Plastic',
            'glasses' => 'Glasses',
        ];
    }


    public static function tubeOptions(): array
    {
        return [
            'plastic' => 'Plastic',
            'laminated' => 'Laminated',
        ];
    }

    public static function sachetsOptions(): array
    {
        return [
            'plastic' => 'Plastic',
            'laminated' => 'Laminated',
        ];
    }

    public static function getPrimaryPackageChildOptions($selectedOption): array
    {
        return match ((int)$selectedOption) {
            PrimaryPackages::jar()->value,
            PrimaryPackages::bottle()->value => PrimaryPackages::jarOrBottleOptions(),
            PrimaryPackages::tube()->value => PrimaryPackages::tubeOptions(),
            default => []
        };
    }

    public static function hidePrimaryPackageChild($selectedOption): bool
    {
        return (is_null($selectedOption) || (int)$selectedOption === PrimaryPackages::sachets()->value);
    }
}
