<?php

namespace App\Services\Revenue;

use App\Models\Account;
use Illuminate\Support\Collection;

class Revenue implements RevenueInterface
{
    public function create(Collection $data, Account $account): mixed
    {
        return $account->revenue()->create($data->toArray());
    }
}
