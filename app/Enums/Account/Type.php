<?php

namespace App\Enums\Account;

enum Type: string
{
    case CurrentAccount = 'conta_corrente';

    case SavingsAcccount = 'conta_poupanca';

    public function label(): string 
    {
        return match ($this) {
            self::CurrentAccount => 'Conta Corrente',
            self::SavingsAcccount => 'Conta Poupança'
        };
    }
}
