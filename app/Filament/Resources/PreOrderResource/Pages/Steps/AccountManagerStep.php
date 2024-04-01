<?php

namespace App\Filament\Resources\PreOrderResource\Pages\Steps;

use App\Domains\Order\Enums\ProjectType;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;

class AccountManagerStep
{
    public static function getStep()
    {
        return Step::make('Account Manager')
            ->description("Setup Account Details")
            ->columns(['md' => 1, 'xl' => 2])
            ->schema([
                Radio::make('project_type')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options([
                        ProjectType::cosmetic()->value => ProjectType::cosmetic()->label,
                        ProjectType::food()->value => ProjectType::food()->label,
                    ]),

                TextInput::make('name')
                    ->label('name')
                    ->required()
                    ->maxLength(60),

                TextInput::make('company_name')
                    ->label('Company Name')
                    ->default('Astrix Com.')
                    ->required()
                    ->maxLength(60),

                TextInput::make('trade_name')
                    ->label('Trade Name')
                    ->required()
                    ->maxLength(60),

                TextInput::make('product_name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(60),
            ]);
    }
}
