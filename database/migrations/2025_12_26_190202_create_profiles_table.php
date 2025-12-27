<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->integer('downrate')->default(0);
            $table->integer('uprate')->default(0);
            $table->boolean('limitdownload')->default(false);
            $table->boolean('limitupload')->default(false);
            $table->boolean('limitexpire')->default(false);
            $table->boolean('limituptime')->default(false);
            $table->integer('unitprice')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
