<?php

namespace App\Enums\Account;

enum Institute: string
{
    case BanckInter = 'inter';

    case BanckNubank = 'nubank';

    case BanckBradesco = 'bradesco';

    case BanckItau = 'itau';

    case BanckSicoob = 'sicoob';

    public function label(): string 
    {
        return match ($this) {
            self::BanckInter => 'Banco Inter',
            self::BanckNubank => 'Banco Nubank',
            self::BanckBradesco => 'Banco Bradesco',
            self::BanckItau => 'Banco Itau',
            self::BanckSicoob => 'Banco Sicoob'
        };
    }
}
