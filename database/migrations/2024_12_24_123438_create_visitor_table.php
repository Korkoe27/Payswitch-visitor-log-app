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
        Schema::create('visitor', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');//done
            $table->string('other_name')->nullable();//done
            $table->string('last_name');//done
            $table->string('email')->nullable();//done
            $table->string('phone_number');//done
            $table->foreignIdFor(Employee::class, 'employee_Id');//done
            $table->string('company_name')->nullable();//done
            $table->integer('access_card_number');//done
            $table->string('vehicle_number')->nullable();//done
            $table->string('purpose')->nullable();//done
            $table->longText('comment')->nullable();
            // $table->boolean('marketing_consent')->nullable();
            $table->json('devices')->nullable();//done
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
