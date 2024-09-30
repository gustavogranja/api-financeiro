<?php

namespace App\Services\Revenue;

use App\Models\Account;
use Illuminate\Support\Collection;

interface RevenueInterface
{
    public function create(Collection $data, Account $account): mixed;
}
