<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarraigeAnnouncesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marraige_announces', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
            $table->string('startingdate');
            $table->string('endingdate');
            $table->string('timing');
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
        Schema::drop('marraige_announces');
    }
}
