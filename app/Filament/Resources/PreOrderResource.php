<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PreOrderResource\Pages;
use App\Filament\Resources\PreOrderResource\Pages\PreOrderDatatable;
use App\Filament\Resources\PreOrderResource\Pages\PreOrderForm;
use App\Models\PreOrder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;

class PreOrderResource extends Resource
{
    protected static ?string $model = PreOrder::class;
    protected static ?string $navigationGroup = 'Orders';
    protected static ?string $navigationLabel = 'Pre Orders';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function form(Form $form): Form
    {
        return $form->columns(1)->schema(PreOrderForm::getForm());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns(PreOrderDatatable::getColumns())
            ->filters([
                //
            ])
            ->actions(PreOrderDatatable::getActions())
            ->bulkActions(PreOrderDatatable::getBulkActions());
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPreOrders::route('/'),
            'create' => Pages\CreatePreOrder::route('/create'),
            'edit' => Pages\EditPreOrder::route('/{record}/edit'),
        ];
    }


}
