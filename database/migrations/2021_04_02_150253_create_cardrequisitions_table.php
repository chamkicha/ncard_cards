<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCardrequisitionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardrequisitions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cardrequisition_no')->nullable();
            $table->string('cardrequisition_date')->nullable();
            $table->string('vendor_no')->nullable();
            $table->string('card_quantity')->nullable();
            $table->string('next_handler')->nullable();
            $table->string('cardrequisition_status')->nullable();
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
        Schema::drop('cardrequisitions');
    }
}
