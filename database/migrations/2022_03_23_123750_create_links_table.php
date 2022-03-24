<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('links', function (Blueprint $table) {
        $table->id();
        $table->string('uuid', 36);
        $table->string('title', 255);
        $table->string('url', 255);
        $table->string('target', 10);
        $table->tinyInteger('publish')->default(0);
        $table->tinyInteger('locked')->default(0);
        $table->nullableMorphs('linkable');
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
        Schema::dropIfExists('links');
    }
}
