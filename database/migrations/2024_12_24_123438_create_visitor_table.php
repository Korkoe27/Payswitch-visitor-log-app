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
        Schema::create('visitor', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number');
            $table->string('employee');
            $table->string('company_name')->nullable();
            $table->integer('access_card_number');
            $table->string('vehicle_number')->nullable();
            $table->string('purpose')->nullable();
            $table->longText('comment')->nullable();
            $table->boolean('marketing_consent')->nullable();
            $table->string('devices')->nullable();
            $table->string('dependents')->nullable();

            $table->timestamps();
            
            $table->index('phone_number', 'idx_phone_number');
            $table->index('email', 'idx_email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor');
    }
};
