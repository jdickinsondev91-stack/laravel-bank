<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasUuid, HasFactory;

    public const DEFAULT_CURRENCY_CODE = 'GBP';
    
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name', 
        'code',
        'symbol',
        'decimal_places',
        'is_active'
    ];

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function baseExchangeRates()
    {
        return $this->hasMany(ExchangeRate::class, 'base_currency_id');
    }

    public function targetExchangeRates()
    {
        return $this->hasMany(ExchangeRate::class, 'target_currency_id');
    }
}