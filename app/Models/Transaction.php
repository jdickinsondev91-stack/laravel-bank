<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasUuid, HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected $fillable = [
        'account_id',
        'transaction_type_id',
        'transaction_subtype_id',
        'exchange_rate_id',
        'from_currency_id',
        'from_amount',
        'to_currency_id',
        'to_amount',
        'status',
        'reference',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function transactionSubtype()
    {
        return $this->belongsTo(TransactionSubtype::class);
    }

    public function exchangeRate()
    {
        return $this->belongsTo(ExchangeRate::class);
    }
}