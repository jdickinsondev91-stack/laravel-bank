# Laravel Bank with Exchange Rates

This project is a basic Laravel application representing a **banking system** with support for **exchange rate tracking**. It includes an admin dashboard powered by Filament for managing currencies and viewing exchange rate data.

## Features

- **Banking context** with exchange rate entities
- Connect with real exchange rate API (exchangerate-api.com)
- **Exchange rate management** with support for tracking historical rates
- Admin panel powered by **Filament 3**
- Basic CRUD interface for `Currency` model via Filament

## Tech Stack

- Laravel 10+
- PostgreSQL
- Filament 3
- PHP 8.2+

## Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/jdickinsondev91-stack/laravel-bank.git
   cd laravel-bank
   ```

2. Install dependencies:

   ```bash
   composer install
   ```

3. Copy and configure your environment file:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Set your database credentials in `.env`.

5. Run migrations:

   ```bash
   php artisan migrate
   ```

6. Seed default database data:

   ```bash
   php artisan db:seed
   ```

7. (Optional) Seed 30 days of default exchange rate data:

   ```bash
   php artisan db:seed --class=CreateExchangeRateDataSeeder
   ```

8. Serve the application:

   ```bash
   php artisan serve
   ```

9. Access the Filament admin panel:

   ```
   http://localhost:8000/admin
   ```

## To-Do

- Add fallback exchange rate api provider using contextual binding
- Add deposit, withdrawal & exchange transaction flows using a strategy pattern
- Implement exchange rate admin dashboard with charts

## License

MIT
