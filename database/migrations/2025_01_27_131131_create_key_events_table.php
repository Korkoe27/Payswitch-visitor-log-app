<?php

use App\Models\Employee;
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
        Schema::create('key_events', function (Blueprint $table) {
            $table->id();
        $table->foreignIdFor(Employee::class, 'picked_by')
            ->constrained('employees')
            ->onDelete('cascade');
        $table->foreignIdFor(Employee::class, 'returned_by')
            ->nullable()
            ->constrained('employees')
            ->onDelete('cascade');
            $table->string('key_name');
        $table->timestamp('picked_at');
        $table->timestamp('returned_at')->nullable();
        $table->enum('status', ['picked', 'returned'])->default('picked');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('key_events');
    }
};
