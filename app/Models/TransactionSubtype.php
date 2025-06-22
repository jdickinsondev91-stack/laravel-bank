<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransactionSubtype extends Model
{
    use HasUuid, HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'slug',
        'transaction_type_id',
    ];

    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}