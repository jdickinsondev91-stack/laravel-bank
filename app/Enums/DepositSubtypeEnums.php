<?php 

namespace App\Enums;

enum DepositSubtypeEnums: string
{
    case MANUAL_ADJUSTMENT = 'manual_adjustment';
    case CASH = 'cash';
    case CHECK = 'check';
    case DIRECT_DEPOSIT = 'direct_deposit';
    case MOBILE_DEPOSIT = 'mobile_deposit';
    case WIRE_TRANSFER = 'wire_transfer';
    case REFUND = 'refund';

    public function label(): string
    {
        return match ($this) {
            self::MANUAL_ADJUSTMENT => 'Manual Adjustment',
            self::CASH => 'Cash',
            self::CHECK => 'Check',
            self::DIRECT_DEPOSIT => 'Direct Deposit',
            self::MOBILE_DEPOSIT => 'Mobile Deposit',
            self::WIRE_TRANSFER => 'Wire Transfer',
            self::REFUND => 'Refund',
        };
    }
}