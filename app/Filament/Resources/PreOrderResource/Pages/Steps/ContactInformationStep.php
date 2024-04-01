<?php

namespace App\Filament\Resources\PreOrderResource\Pages\Steps;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard\Step;

class ContactInformationStep
{
    public static function getStep()
    {
        return Step::make('Contact Information')
            ->description("Add Personal Info")
            ->columns(2)
            ->schema([
                TextInput::make('username')
                    ->label('Username')
                    ->required()
                    ->maxLength(60),

                TextInput::make('mobile')
                    ->label('Mobile Number')
                    ->required()
                    ->maxLength(11),

                TextInput::make('email')
                    ->label('Email Address')
                    ->required()
                    ->email(),
            ]);
    }
}
