<?php

namespace App\Filament\Resources\PreOrderResource\Pages;

use App\Filament\Resources\PreOrderResource\Pages\Steps\AccountManagerStep;
use App\Filament\Resources\PreOrderResource\Pages\Steps\ContactInformationStep;
use App\Filament\Resources\PreOrderResource\Pages\Steps\InformationStep;
use App\Filament\Resources\PreOrderResource\Pages\Steps\PackagingStep;

use Filament\Forms\Components\Wizard;


class PreOrderForm
{
    public static function getForm(): array
    {
        return [
            Wizard::make([
                AccountManagerStep::getStep(),
                ContactInformationStep::getStep(),
                PackagingStep::getStep(),
                InformationStep::getStep(),
            ])
        ];

    }
}
