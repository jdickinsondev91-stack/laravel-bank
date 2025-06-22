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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('account_id');
            $table->uuid('transaction_type_id');
            $table->uuid('transaction_subtype_id');
            $table->uuid('exchange_rate_id')->nullable();
    
            $table->uuid('from_currency_id')->nullable();
            $table->integer('from_amount')->nullable();

            $table->uuid('to_currency_id')->nullable();
            $table->integer('to_amount')->nullable();

            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');

            $table->string('reference')->nullable();

            $table->timestamps();

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->foreign('transaction_type_id')->references('id')->on('transaction_types')->onDelete('restrict');
            $table->foreign('transaction_subtype_id')->references('id')->on('transaction_subtypes')->onDelete('restrict');
            $table->foreign('exchange_rate_id')->references('id')->on('exchange_rates')->onDelete('set null');
            $table->foreign('from_currency_id')->references('id')->on('currencies')->onDelete('set null');
            $table->foreign('to_currency_id')->references('id')->on('currencies')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
