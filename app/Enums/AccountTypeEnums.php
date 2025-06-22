<?php

namespace App\Enums;

enum AccountTypeEnums: string
{
    case CHECKING = 'checking';
    case SAVINGS = 'savings';
    case CREDIT_CARD = 'credit_card';
    case LOAN = 'loan';
    case MORTGAGE = 'mortgage';
    case BUSINESS = 'business';

    public function label(): string
    {
        return match ($this) {
            self::CHECKING => 'Checking Account',
            self::SAVINGS => 'Savings Account',
            self::CREDIT_CARD => 'Credit Card',
            self::LOAN => 'Loan Account',
            self::MORTGAGE => 'Mortgage Account',
            self::BUSINESS => 'Business Account',
        };
    }
}