<?php

namespace App\Filament\Resources\PreOrderResource\Pages;


use App\Domains\Order\Enums\ProcessStep;
use App\Models\PreOrder;
use Filament\Notifications\Notification;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;

class PreOrderDatatable
{
    public static function getColumns(): array
    {
        return [
            TextColumn::make('company_name')
                ->searchable(),

            TextColumn::make('product_name')
                ->searchable(),

            TextColumn::make('product_quantity')
                ->searchable(),

            TextColumn::make('delivery_duration')
                ->searchable(),

            TextColumn::make('dosage_licences')
                ->searchable(),

            TextColumn::make('design_type')
                ->searchable(),

            TextColumn::make('order_date')
                ->searchable()
                ->date()
                ->sortable(),

            TextColumn::make('register_date')
                ->searchable()
                ->date()
                ->sortable(),

            TextColumn::make('process.step_text')
                ->badge()
                ->sortable()
                ->color(function ($state) {
                    return ProcessStep::getColor($state);
                }),
        ];
    }

    public static function getActions(): array
    {

        return [
//                EditAction::make(),
            Action::make('approve')
                ->visible(fn($record) => $record->process->step === ProcessStep::pre_order()->value)
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->action(function (PreOrder $preOrder) {
                    $preOrder->process->approve();
                })->after(function () {
                    Notification::make()->success()->title('This Order was approved')
                        ->duration(2000)
                        ->body('This Pre order Order was approved and process Sent To Orders Now')
                        ->send();
                }),
            Action::make('reject')
                ->visible(fn($record) => $record->process->step === (ProcessStep::pre_order()->value))
                ->icon('heroicon-o-no-symbol')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function (PreOrder $preOrder) {
                    $preOrder->process->reject();
                })->after(function () {
                    Notification::make()->danger()->title(' Pre order rejected')
                        ->duration(2000)
                        ->send();
                })
        ];
    }

    public static function getBulkActions(): array
    {
        return [
            BulkActionGroup::make([
                DeleteBulkAction::make(),
            ]),
        ];
    }
}
