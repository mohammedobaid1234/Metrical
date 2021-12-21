<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('owners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile');
            $table->string('passport_copy')->nullable();
            $table->string('title_dead_copy')->nullable();
            $table->string('emirate_id')->nullable();
            $table->unsignedInteger('unit_number')->nullable();
            $table->unsignedInteger('renting_price')->nullable();
            $table->boolean('direct')->nullable();
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
        Schema::dropIfExists('owners');
    }
}
