<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeTeasersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_teasers', function (Blueprint $table) {
          $table->id();
          $table->string('title', 255);
          $table->string('subtitle', 255)->nullable();
          $table->text('text')->nullable();
          $table->string('link', 255)->nullable();
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
        Schema::dropIfExists('home_teasers');
    }
}
