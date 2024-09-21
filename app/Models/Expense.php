<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [
        'id',
        'account_id'
    ];

    protected $fillable = [
        'type_of_payment',
        'valeu',
        'discription',
        'date_of_payment'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }
}
