<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
          $table->id();
          $table->string('uuid', 36);
          $table->string('name', 255);
          $table->string('original_name', 255);
          $table->string('extension', 4);
          $table->float('size', 24, 0)->default(0);
          $table->string('caption')->nullable();
          $table->string('orientation', 5)->nullable();
          $table->double('coords_w', 16, 12)->nullable();
          $table->double('coords_h', 16, 12)->nullable();
          $table->double('coords_x', 16, 12)->nullable();
          $table->double('coords_y', 16, 12)->nullable();
          $table->tinyInteger('publish')->default(0);
          $table->tinyInteger('locked')->default(0);
          $table->softDeletes();
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
        Schema::dropIfExists('assets');
    }
}
