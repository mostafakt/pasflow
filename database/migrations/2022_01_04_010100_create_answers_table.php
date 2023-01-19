<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();

            $table->longText('text');
            $table->integer('votes')->default(0);
            $table->boolean('accepted')->default(false);

            $table->foreignId('user_id');
            $table->foreignId('question_id');

            // attachments

            $table->foreign('user_id')->on('users')->references('id');
            $table->foreign('question_id')->on('questions')->references('id');

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
        Schema::dropIfExists('answers');
    }
}
