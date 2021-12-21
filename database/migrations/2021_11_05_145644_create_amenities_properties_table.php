<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmenitiesPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenities_properties', function (Blueprint $table) {
            $table->foreignId('property_id')->constrained('properties', 'id')->cascadeOnDelete();
            $table->foreignId('amenity_id')->constrained('amenities', 'id')->cascadeOnDelete();
            $table->primary(['amenity_id', 'property_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amenities_properties');
    }
}
