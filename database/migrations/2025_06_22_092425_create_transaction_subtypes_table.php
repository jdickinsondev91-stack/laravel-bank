<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionSubtypesTable extends Migration
{
    public function up()
    {
        Schema::create('transaction_subtypes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('transaction_type_id')->constrained('transaction_types')->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->unique(['transaction_type_id', 'slug']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_subtypes');
    }
}