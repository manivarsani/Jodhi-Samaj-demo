<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookSocitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_socities', function (Blueprint $table) {
            $table->id('id');
            $table->string('familyname');
            $table->string('function')->nullable();
            // $table->string('marraige');
            // $table->string('sagai');
            // $table->string('samajprogram');
            // $table->string('katha');
            $table->string('startingdate');
            $table->string('endingdate');
            $table->string('totaldaybook');
            // $table->string('toals');
            $table->string('dish');
            $table->string('boull');
            $table->string('glass');
            $table->string('spun');
            // $table->unsignedBigInteger('member_id');
            // $table->foreign('member_id')->references('id')->on('members');
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
        Schema::drop('book_socities');
    }
}
