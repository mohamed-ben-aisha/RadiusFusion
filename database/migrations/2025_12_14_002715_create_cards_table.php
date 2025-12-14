<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_batche_id');
            $table->integer('service_id');
            $table->string('username')->unique();
            $table->string('password')->nullable();
            $table->string('status')->default('new');
            $table->dateTime('sold_at')->nullable();
            $table->dateTime('used_at')->nullable();
            $table->dateTime('expires_at')->nullable();
            $table->foreignId('sold_to')->nullable()->references('id')->on('clients');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
