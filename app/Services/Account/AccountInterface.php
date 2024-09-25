<?php

namespace App\Services\Account;

interface AccountInterface
{
    public function create(array $data): mixed;
}
