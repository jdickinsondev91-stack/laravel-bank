<?php 

namespace App\Enums;

enum TransactionTypeEnums: string
{
    case DEPOSIT = 'deposit';
    case WITHDRAWAL = 'withdrawal';
    case EXCHANGE = 'exchange';

    public function label(): string
    {
        return match ($this) {
            self::DEPOSIT => 'Deposit',
            self::WITHDRAWAL => 'Withdrawal',
            self::EXCHANGE => 'Exchange',
        };
    }
}