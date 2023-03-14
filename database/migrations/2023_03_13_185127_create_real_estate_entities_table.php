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
        Schema::create('real_estate_entities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_id');
            $table->string('address');
            $table->unsignedFloat('size');
            $table->unsignedFloat('number_of_rooms');
            $table->double('latitude', 10, 6);
            $table->double('longitude', 10, 6);
            $table->unsignedInteger('price');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('real_estate_entity_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('real_estate_entities');
    }
};
