<?php

namespace App\Filament\Resources\PreOrderResource\Pages;

use App\Filament\Resources\PreOrderResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPreOrders extends ListRecords
{
    protected static string $resource = PreOrderResource::class;
    protected static ?string $title = 'Pre Orders';
    protected static ?string $breadcrumb = 'Pre Order';


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
