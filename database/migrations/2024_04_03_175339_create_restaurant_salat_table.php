<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantSalatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_salat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('restaurant_id')->unsigned();
            $table->unsignedBiginteger('salat_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants');
            $table->foreign('salat_id')->references('id')
                ->on('salats');

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
        Schema::dropIfExists('restaurant_salat');
    }
}
