<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePinzaRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinza_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('restaurant_id')->unsigned();
            $table->unsignedBiginteger('pinza_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants');
            $table->foreign('pinza_id')->references('id')
                ->on('pinzas');

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
        Schema::dropIfExists('pinza_restaurant');
    }
}
