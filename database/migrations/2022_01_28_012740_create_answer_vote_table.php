<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('answer_vote'))
            Schema::create('answer_vote', function (Blueprint $table) {
                $table->id();

                $table->foreignId('answer_id');
                $table->foreignId('user_id');

                $table->foreign('answer_id')->on('answers')->references('id');
                $table->foreign('user_id')->on('users')->references('id');
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
        Schema::dropIfExists('answer_vote');
    }
}
