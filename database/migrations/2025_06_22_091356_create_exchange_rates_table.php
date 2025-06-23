<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('exchange_rates', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('base_currency_id');
            $table->uuid('target_currency_id');
            $table->decimal('rate', 15, 6);
            $table->timestamp('rate_date');
            $table->timestamps();

            $table->foreign('base_currency_id')->references('id')->on('currencies')->onDelete('cascade');
            $table->foreign('target_currency_id')->references('id')->on('currencies')->onDelete('cascade');

            $table->unique(['base_currency_id', 'target_currency_id', 'rate_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exchange_rates');
    }
};
