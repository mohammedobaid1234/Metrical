<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoveOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('move_outs', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('country');
            $table->string('email');
            $table->string('mobile');
            $table->date('data');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->boolean('agree');


            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('property_id')->constrained('properties')->cascadeOnDelete();

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
        Schema::dropIfExists('move_outs');
    }
}
