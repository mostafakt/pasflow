<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_questions_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_questions_id');
            $table->foreignId('answer_id');

            $table->foreign('quiz_questions_id')->on('quiz_questions')->references('id');
            $table->foreign('answer_id')->on('answers')->references('id');

            $table->double('answer_mark')->nullable();
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
        Schema::dropIfExists('quiz_questions_answers');
    }
}
