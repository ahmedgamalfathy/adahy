<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('safes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['branch', 'representative', 'main']);
            $table->decimal('balance', 12, 2)->default(0);
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('safe_movements', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 12, 2);
            $table->enum('type', ['deposit', 'withdrawal', 'transfer', 'payment']);
            $table->unsignedBigInteger('source_safe_id')->nullable();
            $table->unsignedBigInteger('destination_safe_id')->nullable();
            $table->unsignedBigInteger('reservation_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->string('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('safe_movements');
        Schema::dropIfExists('safes');
    }
};
