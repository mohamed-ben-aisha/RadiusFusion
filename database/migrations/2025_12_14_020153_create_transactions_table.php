<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('number')->nullable();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('reseller_id')->nullable()->references('id')->on('resellers');
            $table->foreignId('branch_id')->nullable()->references('id')->on('branches');
            $table->foreignId('client_id')->nullable()->references('id')->on('clients');
            $table->string('type')->default('client');
            $table->string('service')->nullable();
            $table->string('comment')->nullable();
            $table->decimal('amount')->default(0);
            $table->decimal('price')->default(0);
            $table->decimal('paid')->default(0);
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
