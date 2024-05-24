<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('restaurant_id')->unsigned();
            $table->unsignedBiginteger('hot_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants');
            $table->foreign('hot_id')->references('id')
                ->on('hots');

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
        Schema::dropIfExists('hot_restaurant');
    }
}
