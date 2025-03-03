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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();

            $table->boolean('can_create_users')->default(0);
            $table->boolean('can_edit_users')->default(0);
            $table->boolean('can_delete_users')->default(0);
            $table->boolean('can_view_users')->default(0);

            $table->boolean('can_create_roles')->default(0);
            $table->boolean('can_edit_roles')->default(0);
            $table->boolean('can_view_roles')->default(0);
            $table->boolean('can_delete_roles')->default(0);

            $table->boolean('can_log_visitors')->default(0);


            $table->boolean('can_create_staff')->default(0);
            $table->boolean('can_view_staff')->default(0);
            $table->boolean('can_log_staff_events')->default(0);
            $table->boolean('can_assign_roles')->default(0);


            $table->boolean('can_manage_departments')->default(0);

            $table->boolean('can_manage_keys')->default(0);
            $table->boolean('can_view_keys')->default(0);


            $table->boolean('can_delete_keys')->default(0);

            // $table->boolean('can_create_roles')->default(0);
            // $table->boolean('can_create_roles')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
