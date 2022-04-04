<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_gallery', function (Blueprint $table) {
          $table->id();
          $table->foreignId('article_id');
          $table->foreignId('gallery_id');
          $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
          $table->foreign('gallery_id')->references('id')->on('galleries')->onDelete('cascade');
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
        Schema::dropIfExists('article_gallery');
    }
}
