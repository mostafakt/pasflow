<?php

namespace Database\Seeders;

use App\Models\Interest;
use Illuminate\Database\Seeder;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        (new Interest(['title' => 'Creative']))->save();
        (new Interest(['title' => 'Technical']))->save();
        (new Interest(['title' => 'Interaction']))->save();
    }
}
