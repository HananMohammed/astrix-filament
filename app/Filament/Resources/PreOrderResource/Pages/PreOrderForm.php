<?php

namespace App\Filament\Resources\PreOrderResource\Pages;

use App\Domains\Order\Enums\PrimaryPackages;
use App\Domains\Order\Enums\ProjectType;
use App\Enums\Region;
use Closure;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\HtmlString;
use Suleymanozev\FilamentRadioButtonField\Forms\Components\RadioButton;
use JaOcero\RadioDeck\Forms\Components\RadioDeck;
use Filament\Support\Enums\IconSize;
use Filament\Support\Enums\Alignment;
use Filament\Support\Enums\IconPosition;
use function Termwind\style;

class PreOrderForm
{
    public static function getForm(): array
    {
        return [
            Wizard::make([
                Step::make('Account Manager')
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
                    ]),

                Step::make('Contact Information')
                    ->description("Add Personal Info")
                    ->schema([
                        TextInput::make('username')
                            ->label('Username')
                            ->required()
                            ->columnSpanFull()
                            ->maxLength(60),

                        TextInput::make('mobile')
                            ->label('Mobile Number')
                            ->required()
                            ->maxLength(11),

                        TextInput::make('email')
                            ->label('Email Address')
                            ->required()
                            ->email(),
                    ]),
                Step::make('Primary Packaging')
                    ->description("Add Data About Packaging")
                    ->schema([
                        RadioDeck::make('primary_packaging')
                            ->options(PrimaryPackages::toLabels())
                            ->descriptions(PrimaryPackages::labelDescriptions())
                            ->required()
                            ->gap('gap-5')
                            ->padding('px-4 px-10')
                            ->direction('column')
                            ->extraCardsAttributes([
                                'class' => 'rounded-xl',
                                'style' => 'margin-right: 15px;'
                            ])
                            ->extraOptionsAttributes([
                                'class' => 'text-3xl leading-none w-full flex flex-col items-center justify-center p-4 mb-5'
                            ])
                            ->extraDescriptionsAttributes([
                                'style' => 'margin-top: 15px;',
                                'class' => 'text-sm font-light text-center'
                            ])
                            ->color('primary')
                            ->columns(4)
                            ->live(),

                        Radio::make('primary_selected_option')
                            ->label(function (Get $get) {
                                return !PrimaryPackages::hidePrimaryPackageChild($get('primary_packaging')) ?
                                    PrimaryPackages::toLabels()[$get('primary_packaging')] : '';
                            })
                            ->columnSpanFull()
                            ->inline()
                            ->inlineLabel(false)
                            ->options(function (Get $get) {
                                return PrimaryPackages::getPrimaryPackageChildOptions($get('primary_packaging'));
                            })
                            ->requiredIf('primary_packaging', '!=', PrimaryPackages::sachets()->value)
                            ->hidden(fn(Get $get): bool|null => PrimaryPackages::hidePrimaryPackageChild($get('primary_packaging'))),

                        Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->cols(10)
                    ]),
            ]),
//
//            TextInput::make('product_quantity')
//                ->numeric(),
//
//            TextInput::make('delivery_duration')
//                ->label('Delivery Duration')
//                ->required()
//                ->maxLength(60),
//
//            TextInput::make('dosage_licences')
//                ->label('Dosage Licences')
//                ->required()
//                ->maxLength(60),
//
//            TextInput::make('design_type')
//                ->label('Type Of Design')
//                ->required()
//                ->maxLength(60),
//
//            DatePicker::make('order_date')
//                ->native(false)
//                ->required(),
//
//            DatePicker::make('register_date')
//                ->native(false)
//                ->required(),
        ];

    }
}
