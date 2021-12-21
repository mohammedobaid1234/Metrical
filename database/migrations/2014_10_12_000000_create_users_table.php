<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('password')->nullable();
            $table->string('image_url')->nullable();
            // 0 => 'normal user' , 1=> 'owner user' , 2 =>'tenant' , 3 => 'admin'
            $table->enum('type', [0, 1, 2, 3]);
            // 0=> 'pending' , '1' => 'accept', '2' => 'refuse' 
            $table->enum('status', [0, 1, 2]);
            $table->string('code', 6)->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}