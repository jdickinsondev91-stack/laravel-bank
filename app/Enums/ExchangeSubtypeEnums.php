<?php 

namespace App\Enums;

enum ExchangeSubtypeEnums: string
{
    case CURRENCY_CONVERSION = 'currency_conversion';
    case FOREX_TRADE = 'forex_trade';
    case INTERNATIONAL_WIRE = 'international_wire';
    case CROSS_BORDER_PAYMENT = 'cross_border_payment';
    case CRYPTO_EXCHANGE = 'crypto_exchange';
    case ARBITRAGE = 'arbitrage';

    public function label(): string
    {
        return match ($this) {
            self::CURRENCY_CONVERSION => 'Currency Conversion',
            self::FOREX_TRADE => 'Forex Trade',
            self::INTERNATIONAL_WIRE => 'International Wire',
            self::CROSS_BORDER_PAYMENT => 'Cross-border Payment',
            self::CRYPTO_EXCHANGE => 'Crypto Exchange',
            self::ARBITRAGE => 'Arbitrage',
        };
    }
}