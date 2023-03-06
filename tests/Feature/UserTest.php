<?php

namespace Tests\Feature;

use App\Models\Question;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Tests\TestCase;
use function Symfony\Component\String\s;

class UserTest extends TestCase
{

    public function test_login()
    {
        $user = User::factory()->make();

        $regresponse = $this->post('/api/register', [

            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "email" => $user->email,
            "password" => $user->password,
            "address" => $user->address,
            "position" => $user->position
        ]);
        $regresponse->assertStatus(200);


        $response = $this->post('/api/login', [
            "email" => $user->email,
            "password" => $user->password,
        ]);

        $response->assertStatus(200);
    }

//    public function test_hasUser()
//    {
//        //   $question = Question::factory()->create();
//        //   printf($question);
//
//        $this->assertDatabaseHas('users', [
//            'first_name' => 'zaher'
//        ]);
//    }
}
