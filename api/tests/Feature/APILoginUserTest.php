<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class APILoginUserTest extends TestCase
{
    use RefreshDatabase;

    private $endpoint;
    private $email; 
    private $password;
    private $user; 

    public function setup():void
    {
        parent::setup(); 

        $this->endpoint = 'http://roastandbrew-api.521.test/login';


    }

    /** @test */

    public function a_user_can_not_login_if_pass_is_missing()
    {
        $response = $this->json('post', $this->endpoint, [
            'email' => 'tima@wimbeldon.co.uk',
            'password' => ''
        ]);

        $response->assertJsonValidationErrors([
            'password' => 'The password field is required.'
        ]);
    }

    /** @test */

    public function a_user_can_not_login_if_email_is_missing()
    {
        $response = $this->json('post', $this->endpoint, [
            'email' => '',
            'password' => 'secretPassword'
        ]);

        $response->assertJsonValidationErrors([
            'email' => 'The email field is required.'
        ]);
    }

    /** @test */

    public function a_user_can_not_login_if_email_and_password_are_missing()
    {
        $response = $this->json('post', $this->endpoint, [
            'email' => '',
            'password' => ''
        ]);

        $response->assertJsonValidationErrors([
            'email', 'password'
        ]);
    }

    /** @test */

    public function a_user_can_not_log_in_with_wrong_credentials()
    {
        $response = $this->json('post', $this->endpoint, [
            'email' => 'hello@world.com',
            'password' => 'password'
        ]);
        
        $response->assertStatus(403)
            ->assertJson([
                'error' => 'invalid_credentials'
            ]);
    }

    /** @test */

    public function a_user_can_log_in_with_correct_credentials()
    {
        $this->user = User::factory()->create([
            'name' => 'Rafa Nadal',
            'email' => 'rafa.nadal@rollandgarros.com', 
            'password' => bcrypt($password = 'secretPassword')
        ]);

        $response = $this->json('post', $this->endpoint, [
            'email' => 'rafa.nadal@rollandgarros.com', 
            'password' => 'secretPassword',
        ]);
        
        $response->assertSuccessful();
    }
}
