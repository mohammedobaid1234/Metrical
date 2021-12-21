<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            //Global Info
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('passport_copy')->nullable();
            $table->string('title_dead_copy')->nullable();
            $table->string('emirate_id')->nullable();

            //Sale Offer
            $table->unsignedFloat('sale_price')->nullable();

            //Rent Offer
            $table->unsignedFloat('rent_price')->nullable();
            $table->date('rent_start_date')->nullable();
            $table->date('rent_end_date')->nullable();

            //Type ^_^
            $table->enum('type', ['sale', 'rent', 'stop']);
            $table->foreignId('property_id')->constrained('properties', 'id')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users', 'id')->cascadeOnDelete();
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
        Schema::dropIfExists('offers');
    }
}