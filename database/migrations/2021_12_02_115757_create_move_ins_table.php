<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoveInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('move_ins', function (Blueprint $table) {
            $table->id();
            //step 1
            $table->string('full_name');
            $table->string('country');
            $table->string('email');
            $table->string('aduls');
            $table->string('passport_number')->nullable();
            $table->string('trn_number')->nullable();
            $table->string('nationalty');
            $table->string('mobile');
            $table->string('emirate_id')->nullable();
            $table->integer('children_number');
            //step 2
            $table->date('data');
            $table->dateTime('start_time');
            $table->dateTime('end_time');

            //step 3 (Emergancy Contact)



            //step 4 (Documents)
            $table->string('tenancy_contract');
            $table->date('contract_expiry');
            $table->string('passport');
            $table->date('passport_expiry');
            $table->string('title_dead');
            $table->string('emirateId_image');

            $table->json('registration_number_vehicle');

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
        Schema::dropIfExists('move_ins');
    }
}
