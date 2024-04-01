<?php

namespace App\Filament\Resources\PreOrderResource\Pages\Steps;

use App\Domains\Order\Enums\Barcode;
use App\Domains\Order\Enums\DoseAddedBy;
use App\Domains\Order\Enums\Ingredient;
use App\Domains\Order\Enums\MasterFormulaDetails;
use App\Domains\Order\Enums\SfdaRegistration;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Get;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Illuminate\Support\Facades\Hash;

class InformationStep
{
    public static function getStep()
    {
        return Step::make('Information')
            ->description("Add Data About Packaging")
            ->columns(['md' => 1, 'xl' => 2])
            ->schema([
                self::informationFieldSet(),
                self::formulaDetails(),
            ]);


    }

    public static function informationFieldSet()
    {

        return Fieldset::make('Information')
            ->schema([
                Radio::make('astrix_pharma')
                    ->label('Astrix Pharma manufacture Information To be added?( in case If the product is European)')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->boolean(),

                Radio::make('ingredients')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options(Ingredient::toLabels()),

                Radio::make('barcode_type')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->live()
                    ->inlineLabel(false)
                    ->options(Barcode::toLabels()),

                TextInput::make('barcode')
                    ->required()
                    ->visible(fn(Get $get): bool|null => $get('barcode_type') == Barcode::from_client()->value),

                Radio::make('sfda_registration')
                    ->options(SfdaRegistration::toLabels())
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->live()
                    ->inlineLabel(false),

                TextInput::make('sfda_client_username')
                    ->label('Username')
                    ->clearAfterStateUpdatedHooks()
                    ->required()
                    ->maxLength(50)
                    ->visible(fn(Get $get): bool|null => $get('sfda_registration') == SfdaRegistration::client_account()->value),

                TextInput::make('sfda_client_password')
                    ->label('Password')
                    ->clearAfterStateUpdatedHooks()
                    ->required()
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->visible(fn(Get $get): bool|null => $get('sfda_registration') == SfdaRegistration::client_account()->value),

                SpatieMediaLibraryFileUpload::make('primary_packaging_picture')
                    ->columnSpanFull()
                    ->label('Primary packaging Picture')
                    ->multiple()
                    ->reorderable()
                    ->responsiveImages()
            ]);
    }

    public static function formulaDetails()
    {
        return Fieldset::make('Master Formula Details')
            ->schema([
                Radio::make('master_formula_details')
                    ->label('Master Formula Details')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->options(MasterFormulaDetails::toLabels()),
                TextInput::make('active_material_details')
                    ->maxLength(200)
                    ->required(),

                TextInput::make('product_color_and_odor')
                    ->required()
                    ->maxLength(200),

                Radio::make('dose_added_by')
                    ->options(DoseAddedBy::toLabels())
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->live()
                    ->inlineLabel(false),

                TextInput::make('dose_name')
                    ->label('Dose Name')
                    ->required()
                    ->maxLength(200)
                    ->visible(fn(Get $get): bool|null => $get('dose_added_by') == DoseAddedBy::client()->value),

                TextInput::make('specified_claims')
                    ->label('Specified Claims')
                    ->required()
                    ->maxLength(200),

                Radio::make('approved_by_sale')
                    ->label('The Primary Packaging Shape Approved by Sale')
                    ->required()
                    ->columnSpanFull()
                    ->inline()
                    ->inlineLabel(false)
                    ->boolean(),
            ]);
    }
}
