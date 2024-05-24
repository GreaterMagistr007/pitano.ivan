<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hots', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('title')->nullable();
            $table->text('price')->nullable();
            $table->text('product_id')->nullable();
            $table->text('text')->nullable();
            $table->text('image')->nullable();

            $table->text('order')->nullable();
            $table->text('show_on_site')->nullable();
            $table->text('parent_id')->nullable();

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
        Schema::dropIfExists('hots');
    }
}
