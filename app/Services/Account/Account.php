<?php

namespace App\Services\Account;

use App\Models\Account as ModelsAccount;

class Account implements AccountInterface
{
    public function create(array $data): mixed
    {
        return ModelsAccount::query()->create($data);
    }
}
