<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterEventsTableAddFields extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('events', function (Blueprint $table) {
      $table->string('title', 255)->after('id');
      $table->string('subtitle', 255)->nullable()->after('title');
      $table->text('text')->nullable()->after('subtitle');
      $table->date('date')->nullable()->after('text');
      $table->time('time', 0)->nullable()->after('date');
      $table->tinyInteger('publish')->default(0)->after('time');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {

  }
}
