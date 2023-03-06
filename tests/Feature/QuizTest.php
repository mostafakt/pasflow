<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

//use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuizTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_Quiz()
    {
        $response = $this->get('/api/questions');
        $response->assertStatus(200);
    }

    public function test_store_Quiz()
    {
        $user = User::factory()->make();

        $registerResponse = $this->post('/api/register', [
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "email" => $user->email,
            "password" => $user->password,
            "address" => $user->address,
            "position" => $user->position
        ]);

//        $registerResponse->assertStatus(200);

        $accessToken = $registerResponse->getOriginalContent()['access_token'];

        $response = $this->post('/api/quiz')->withHeaders(['authorization' => 'bearer ' . $accessToken]);
        $response->assertStatus(200);
    }


}
