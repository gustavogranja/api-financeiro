<?php

namespace App\Services\Expense;

use App\Models\Account;
use Illuminate\Support\Collection;

interface ExpenseInterface
{
    public function create(Collection $data, Account $account): mixed;
}
