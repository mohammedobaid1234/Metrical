<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('name_gr');
            $table->unsignedFloat('area');
            $table->string('reference');
            $table->string('feminizations');

            $table->boolean('is_shortterm');
            $table->unsignedInteger('bedroom')->default(0);
            $table->unsignedInteger('bathroom')->default(0);
            $table->unsignedInteger('gate')->default(0);
            $table->date('date_added')->nullable();
            $table->string('address_ar');
            $table->string('address_en');
            $table->string('address_gr');
            $table->text('description_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_gr')->nullable();
            $table->string('city')->nullable();
            $table->string('location_latitude');
            $table->string('location_longitude');
            $table->json('amenities')->nullable();
            $table->string('image_url')->nullable();
            $table->json('images')->nullable();

            $table->enum('type', ['house', 'apartment']);

            $table->enum('offer_type', ['stop', 'sale', 'rent', 'both',]);
            // 0 is under Contruction , 1 is Ready
            $table->enum('status', [0, 1]);

            //forignK
            $table->foreignId('community_id')->constrained('communities')->cascadeOnDelete();
            $table->foreignId('owner_id')->nullable()->constrained('owners')->cascadeOnDelete();
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
        Schema::dropIfExists('properties');
    }
}
