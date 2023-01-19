<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->mediumText('title');
            $table->longText('details');
            // Files
            // Tags
            $table->integer('votes')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->boolean('closed')->default(false);
            // Answers
            // Comments
            // Favorite

            $table->foreignId('category_id');
            $table->foreignId('user_id');

            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
