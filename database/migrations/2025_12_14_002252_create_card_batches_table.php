<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('card_batches', function (Blueprint $table) {
            $table->id();
            $table->integer('service_id');
            $table->string('batch_code')->unique()->nullable();
            $table->integer('total_cards')->default(0);
            $table->decimal('price_per_card')->default(0);
            $table->decimal('total_amount')->default(0);
            $table->string('status')->nullable();
            $table->string('type')->default('hotspot');
            $table->string('note')->nullable();

            $table->foreignId('server_id')->references('id')->on('servers');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('card_batches');
    }
};
