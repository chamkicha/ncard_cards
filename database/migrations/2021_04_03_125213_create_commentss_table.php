<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentssTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commentss', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment')->nullable();
            $table->string('user_id')->nullable();
            $table->string('username')->nullable();
            $table->string('cardrequisition_no')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('commentss');
    }
}
