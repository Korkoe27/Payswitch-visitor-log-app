<?php

use App\Models\Department;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'first_name');
            $table->string(column: 'last_name');
            $table->string(column: 'email')->nullable();
            $table->string(column: 'phone_number');
            $table->foreignIdFor(Department::class, column: 'department_id');
            $table->string(column: 'job_title');
            $table->string(column: 'gender');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};