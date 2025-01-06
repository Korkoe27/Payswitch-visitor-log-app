<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Enforce unique constraint for 'name'
            $table->string('key_id')->unique(); // Add unique constraint for 'key_id'
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};

