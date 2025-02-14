<?php

use App\Models\AccessCards;
use App\Models\Visitor;
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
        Schema::create('access_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visitor_id')->unsigned();
            $table->string('card_number')->nullable();
            $table->timestamps();


            $table->foreignIdFor(Visitor::class,'visitor_id');

            $table->foreignIdFor(AccessCards::class,'card_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('access_cards');
    }
};
