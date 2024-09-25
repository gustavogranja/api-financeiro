<?php

namespace App\Services\Expense;

use App\Models\Account;
use Illuminate\Support\Collection;

class Expense implements ExpenseInterface
{
    public function create(Collection $data, Account $account): mixed
    {
        return $account->expense()->create($data->toArray());
    }
}
