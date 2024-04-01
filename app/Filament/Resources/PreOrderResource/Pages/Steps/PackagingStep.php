<?php

namespace App\Filament\Resources\PreOrderResource\Pages\Steps;

use App\Domains\Order\Enums\PrimaryPackages;
use App\Domains\Order\Enums\PrimaryPackagingAccessories;
use App\Domains\Order\Enums\SecondaryPackaging;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use JaOcero\RadioDeck\Forms\Components\RadioDeck;

class PackagingStep
{
    public static function getStep()
    {
        return Step::make('Packaging')
            ->description("Add Data About Packaging")
            ->schema([
                self::primaryPackagingFieldSet(),
                self::primaryPackagingAccessoriesFieldSet(),
                self::colorsFieldSet(),
                self::secondaryPackagingFieldSet(),
            ]);
    }

    public static function primaryPackagingFieldSet()
    {
        return Fieldset::make('Primary packaging')
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
                    ->columnSpanFull()
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

                Textarea::make('primary_packaging_description')
                    ->label('Description')
                    ->columnSpanFull()
                    ->required()
                    ->rows(5)
                    ->cols(10)
            ]);
    }

    public static function primaryPackagingAccessoriesFieldSet()
    {
        return Fieldset::make('Primary Packaging Accessories')
            ->schema([
                Radio::make('primary_packaging_accessories')
                    ->options(PrimaryPackagingAccessories::toLabels())
                    ->required()
                    ->inline()
                    ->inlineLabel(false)
                    ->columnSpanFull()
                    ->reactive()
                    ->live(),

                Radio::make('accessories_option')
                    ->label(function (Get $get) {
                        return !PrimaryPackagingAccessories::hideChild($get('primary_packaging_accessories')) ?
                            PrimaryPackagingAccessories::toLabels()[$get('primary_packaging_accessories')] : '';
                    })
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options(function (Get $get) {
                        return PrimaryPackagingAccessories::getChildOptions($get('primary_packaging_accessories'));
                    })
                    ->nullable()
                    ->hidden(fn(Get $get): bool|null => PrimaryPackagingAccessories::hideChild($get('primary_packaging_accessories'))),

                Textarea::make('accessories_description')
                    ->label('Description')
                    ->columnSpanFull()
                    ->required()
                    ->rows(5)
                    ->cols(10)
            ]);
    }

    public static function colorsFieldSet()
    {
        return Fieldset::make('Colors')
            ->columns(2)
            ->schema([
                ColorPicker::make('primary_package_color')->required(),
                ColorPicker::make('accessories_color')->required()
            ]);
    }

    public static function secondaryPackagingFieldSet()
    {
        return Fieldset::make('Secondary packaging')
            ->schema([
                Radio::make('secondary_packaging')
                    ->options(SecondaryPackaging::toLabels())
                    ->required()
                    ->inline()
                    ->inlineLabel(false)
                    ->columnSpanFull()
                    ->live(),

                Radio::make('secondary_packaging_option')
                    ->label(function (Get $get) {
                        return SecondaryPackaging::toLabels()[$get('secondary_packaging')];
                    })
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options(function (Get $get) {
                        return SecondaryPackaging::getChildOptions($get('secondary_packaging'));
                    })
                    ->live()
                    ->nullable()
                    ->hidden(fn(Get $get): bool|null => SecondaryPackaging::hideChild($get('secondary_packaging'))),

                Textarea::make('secondary_description')
                    ->label('Description')
                    ->visible(fn(Get $get): bool|null => SecondaryPackaging::showDescription($get))
                    ->columnSpanFull()
                    ->required()
                    ->rows(5)
                    ->cols(10),

                Radio::make('label_sticker')
                    ->label('Label Sticker Option')
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options(SecondaryPackaging::labelStickerOptions())
                    ->live()
                    ->nullable()
                    ->visible(fn(Get $get): bool|null => SecondaryPackaging::showLabelSticker($get)),
            ]);
    }
}
