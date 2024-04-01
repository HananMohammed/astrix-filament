<?php

namespace App\Domains\Order\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self new_formula()
 * @method static self old_formula()
 * @method static self external_supplier()
 */
class MasterFormulaDetails extends Enum

{

    protected static function values(): array
    {
        return [
            'new_formula' => 1,
            'old_formula' => 2,
            'external_supplier' => 3,
        ];
    }

    public static function toLabels(): array
    {
        return [
            1 => 'New Formula',
            2 => 'Old Formula',
            3 => 'External Supplier',
        ];
    }


    protected static function labels(): array
    {
        return [
            'new_formula' => 'New Formula',
            'old_formula' => 'Old Formula',
            'external_supplier' => 'External Supplier',
        ];
    }
}
