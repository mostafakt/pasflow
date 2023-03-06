<?php

namespace Database\Seeders;

use Couchbase\Role;
use Database\Factories\RuleFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FileSeeder::class,
            RuleSeeder::class,
            UserSeeder::class,
            InterestSeeder::class,
            CategorySeeder::class,
            QuestionSeeder::class,
            AnswerSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
