<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->foreignId('branch_id')->nullable();
            $table->foreignId('reseller_id')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->default('open');
            $table->string('number')->nullable();
            $table->string('priority')->default('medium');
            $table->string('category')->nullable();
            $table->string('issue_description')->nullable();
            $table->string('reported_problem')->nullable();
            $table->string('signal')->nullable();
            $table->string('assigned_technician')->nullable();
            $table->dateTime('assigned_at')->nullable();
            $table->dateTime('started_at')->nullable();
            $table->dateTime('resolved_at')->nullable();
            $table->dateTime('closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
