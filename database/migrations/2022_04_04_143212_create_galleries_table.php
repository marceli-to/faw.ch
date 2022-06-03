<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('galleries', function (Blueprint $table) {
        $table->id();
        $table->string('title', 255)->nullable();
        $table->text('subtitle')->nullable();
        $table->text('text')->nullable();
        $table->text('credits')->nullable();
        $table->string('link_text', 255);
        $table->tinyInteger('order')->default(-1);
        $table->tinyInteger('publish')->default(1);
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
      Schema::dropIfExists('galleries');
    }
}
