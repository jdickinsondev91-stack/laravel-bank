<?php 

namespace App\Enums;

enum WithdrawalSubtypeEnums: string
{
    case ATM_WITHDRAWAL = 'atm_withdrawal';
    case ONLINE_TRANSFER = 'online_transfer';
    case CHECK_WITHDRAWAL = 'check_withdrawal';
    case BRANCH_WITHDRAWAL = 'branch_withdrawal';
    case BILL_PAYMENT = 'bill_payment';
    case DEBIT_CARD_PURCHASE = 'debit_card_purchase';
    case FEE_DEDUCTION = 'fee_deduction';

    public function label(): string
    {
        return match ($this) {
            self::ATM_WITHDRAWAL => 'ATM Withdrawal',
            self::ONLINE_TRANSFER => 'Online Transfer',
            self::CHECK_WITHDRAWAL => 'Check Withdrawal',
            self::BRANCH_WITHDRAWAL => 'Branch Withdrawal',
            self::BILL_PAYMENT => 'Bill Payment',
            self::DEBIT_CARD_PURCHASE => 'Debit Card Purchase',
            self::FEE_DEDUCTION => 'Fee Deduction',
        };
    }
}