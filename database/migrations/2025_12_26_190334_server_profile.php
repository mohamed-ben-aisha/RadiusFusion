<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('server_profile', function (Blueprint $table) {
            $table->id();

            $table->foreignId('server_id')->constrained()->references('id')->on('servers');
            $table->foreignId('profile_id')->constrained()->references('id')->on('profiles');
            $table->integer('sevid');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('server_profile');
    }
};
