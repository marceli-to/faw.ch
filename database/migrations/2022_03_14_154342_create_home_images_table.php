<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_images', function (Blueprint $table) {
          $table->id();
          $table->string('name');
          $table->string('caption')->nullable();
          $table->string('orientation', 10)->nullable();
          $table->double('coords_w', 16, 12)->nullable();
          $table->double('coords_h', 16, 12)->nullable();
          $table->double('coords_x', 16, 12)->nullable();
          $table->double('coords_y', 16, 12)->nullable();
          $table->tinyInteger('order')->default(-1);
          $table->tinyInteger('publish')->default(0);
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
        Schema::dropIfExists('home_images');
    }
}
