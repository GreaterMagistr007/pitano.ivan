<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMakaronRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('makaron_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('restaurant_id')->unsigned();
            $table->unsignedBiginteger('makaron_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants');
            $table->foreign('makaron_id')->references('id')
                ->on('makarons');

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
        Schema::dropIfExists('makaron_restaurant');
    }
}
