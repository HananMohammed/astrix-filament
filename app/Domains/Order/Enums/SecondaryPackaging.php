<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self box()
 * @method static self without_box()
 */
class SecondaryPackaging extends Enum

{

    protected static function values(): array
    {
        return [
            'box' => 1,
            'without_box' => 2,
        ];
    }

    protected static function labels(): array
    {
        return [
            'box' => 'Box',
            'without_box' => 'Without Box',
        ];
    }


    public static function toLabels(): array
    {
        return [
            1 => 'Box',
            2 => 'Without Box',
        ];
    }

    public static function boxOptions(): array
    {
        return [
            'cellophane_matt' => 'Cellophane matt',
            'cellophane_glossy' => 'Cellophane Glossy',
            'stamp' => 'Stamp',
            'uv' => 'UV',
            'coverage' => 'Coverage',
            'other' => 'Other',
        ];
    }


    public static function withoutBoxOptions(): array
    {
        return [
            'direct_printing' => 'Direct Printing',
            'label_sticker' => 'Label Sticker'
        ];
    }

    public static function labelStickerOptions(): array
    {
        return [
            'white' => 'White',
            'transparent' => 'Transparent',
            'mataliz' => 'Mataliz'
        ];
    }


    public static function getChildOptions($selectedOption): array
    {
        return match ((int)$selectedOption) {
            SecondaryPackaging::box()->value => SecondaryPackaging::boxOptions(),
            SecondaryPackaging::without_box()->value => SecondaryPackaging::withoutBoxOptions(),
            default => []
        };
    }

    public static function hideChild($selectedOption): bool
    {
        return is_null($selectedOption);
    }

    public static function showDescription($get): bool
    {
        return $get('secondary_packaging_option') === 'other' &&  $get('secondary_packaging') == SecondaryPackaging::box()->value;
    }

    public static function showLabelSticker($get): bool
    {
        return $get('secondary_packaging_option') === 'label_sticker' &&  $get('secondary_packaging') == SecondaryPackaging::without_box()->value;
    }
}
