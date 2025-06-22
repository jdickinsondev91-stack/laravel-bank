<?php

namespace App\Models;

use App\Traits\HasCustomAccountId;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasCustomAccountId, HasFactory;

    protected $fillable = [
        'user_id',
        'currency_id',
        'account_type_id',
        'sort_code',
        'balance',
        'open',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime' 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}