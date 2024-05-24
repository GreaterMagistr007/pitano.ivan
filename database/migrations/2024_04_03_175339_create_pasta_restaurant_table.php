<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastaRestaurantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasta_restaurant', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBiginteger('restaurant_id')->unsigned();
            $table->unsignedBiginteger('pasta_id')->unsigned();

            $table->foreign('restaurant_id')->references('id')
                ->on('restaurants');
            $table->foreign('pasta_id')->references('id')
                ->on('pastas');

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
        Schema::dropIfExists('pasta_restaurant');
    }
}
