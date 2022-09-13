<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormerBoardMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('former_board_members', function (Blueprint $table) {
          $table->id();
          $table->string('description', 255);
          $table->unsignedBigInteger('former_board_member_type_id');
          $table->foreign('former_board_member_type_id')->references('id')->on('former_board_member_types');
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
        Schema::dropIfExists('former_board_members');
    }
}
