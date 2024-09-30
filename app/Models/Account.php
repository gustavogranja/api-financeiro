<?php

namespace App\Models;

use App\Enums\Account\Institute;
use App\Enums\Account\Type;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Account extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = [
        'id'
    ];

    protected function typeAccount(): Attribute 
    {
        return Attribute::make(
            get: fn ($value) => Type::tryFrom($value)->label(),
        );
    }

    protected function institute(): Attribute 
    {
        return Attribute::make(
            get: fn ($value) => Institute::tryFrom($value)->label(),
        );
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);    
    }

    public function expense(): HasMany
    {
        return $this->hasMany(Expense::class);    
    }

    public function revenue(): HasMany
    {
        return $this->hasMany(Revenue::class);    
    }
}
