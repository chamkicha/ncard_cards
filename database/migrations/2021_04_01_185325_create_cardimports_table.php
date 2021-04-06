<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardimportsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardimports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_number')->nullable();
            $table->string('card_u_i_d')->nullable();
            $table->string('order_number')->nullable();
            $table->string('batch_no')->nullable();
            $table->string('status')->nullable();
            $table->date('receive_date')->nullable();
            $table->string('attachment')->nullable();
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
        Schema::drop('cardimports');
    }
}
