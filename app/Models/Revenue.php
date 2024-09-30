<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Revenue extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime: d/m/Y'
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);    
    }
}
