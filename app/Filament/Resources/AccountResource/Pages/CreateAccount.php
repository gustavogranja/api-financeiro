<?php

namespace App\Filament\Resources\AccountResource\Pages;

use App\Filament\Resources\AccountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateAccount extends CreateRecord
{
    protected static string $resource = AccountResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        data_set($data, 'user_id', auth()->id());
        
        return static::getModel()::create($data);
    }
}
