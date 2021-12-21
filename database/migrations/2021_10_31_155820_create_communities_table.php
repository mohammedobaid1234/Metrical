<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_gr');
            $table->unsignedFloat('area')->default(0);
            $table->unsignedFloat('location_longitude')->nullable();
            $table->unsignedFloat('location_latitude')->nullable();
            $table->string('address')->nullable();
            $table->string('image')->nullable();
            // 0 is Under Construction , 1 is Ready ;
            $table->enum('status', [0, 1]);
            $table->integer('readness_percentage')->default(0);

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
        Schema::dropIfExists('communities');
    }
}