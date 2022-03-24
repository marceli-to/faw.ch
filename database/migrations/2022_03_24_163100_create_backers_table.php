<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backers', function (Blueprint $table) {
          $table->id();
          $table->string('name', 255);
          $table->string('city', 255)->nullable();
          $table->tinyInteger('publish')->default(0);
          $table->unsignedBigInteger('backer_type_id');
          $table->foreign('backer_type_id')->references('id')->on('backer_types');
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
        Schema::dropIfExists('backers');
    }
}
