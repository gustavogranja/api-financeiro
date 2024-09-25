<?php

namespace App\Filament\Resources\ExpenseResource\Pages;

use App\Filament\Resources\ExpenseResource;
use App\Models\Account;
use App\Services\Expense\Expense;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateExpense extends CreateRecord
{
    protected static string $resource = ExpenseResource::class;
    
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data = collect($data);

        $account = Account::query()->find($data->get('account_id'));

        $data->forget('account_id');

        return (new Expense())->create($data, $account);
    }
}
