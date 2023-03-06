<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Answer::factory(50)->has(Comment::factory()->count(2))->create( );
    }
}
