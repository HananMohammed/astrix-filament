<?php

namespace App\Domains\Order\Form;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;

class PreOrderForm
{
    public static function getForm(): array
    {
        return [
            TextInput::make('company_name')
                ->label('Company Name')
                ->default('Astrix Com.')
                ->required()
                ->maxLength(60),

            TextInput::make('product_name')
                ->label('Product Name')
                ->required()
                ->maxLength(60),

            TextInput::make('product_quantity')
                ->numeric(),

            TextInput::make('delivery_duration')
                ->label('Delivery Duration')
                ->required()
                ->maxLength(60),

            TextInput::make('dosage_licences')
                ->label('Dosage Licences')
                ->required()
                ->maxLength(60),

            TextInput::make('design_type')
                ->label('Type Of Design')
                ->required()
                ->maxLength(60),

            DatePicker::make('order_date')
                ->native(false)
                ->required(),

            DatePicker::make('register_date')
                ->native(false)
                ->required(),
        ];

    }
}
