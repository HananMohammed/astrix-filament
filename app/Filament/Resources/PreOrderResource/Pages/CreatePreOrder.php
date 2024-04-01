<?php

namespace App\Filament\Resources\PreOrderResource\Pages;

use App\Filament\Resources\PreOrderResource;
use App\Models\Process;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class CreatePreOrder extends CreateRecord
{
    protected static string $resource = PreOrderResource::class;
    protected static ?string $title = 'Create Pre Order';

    protected function handleRecordCreation(array $data): Model
    {
        $process = Process::create([
            'project_type' => $data['project_type'],
            'order_date' => date("Y-m-d"),
            'register_date' => date("Y-m-d"),
            'user_id' => auth()->id(),
        ]);

        $data = array_merge($data, ['process_id' => $process->id, 'user_id' => auth()->id()]);
        return static::getModel()::create($data);

    }
}
