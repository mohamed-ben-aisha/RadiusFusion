<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('profile_spec_per_accounts', function (Blueprint $table) {
            $table->id();

            $table->integer('srvid');
            $table->time('starttime');
            $table->time('endtime');
            $table->decimal('timeratio');
            $table->decimal('dlratio');
            $table->decimal('ulratio');
            $table->boolean('connallowed');
            $table->boolean('sat');
            $table->boolean('sun');
            $table->boolean('mon');
            $table->boolean('tue');
            $table->boolean('wed');
            $table->boolean('thu');
            $table->boolean('fri');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_spec_per_accounts');
    }
};
