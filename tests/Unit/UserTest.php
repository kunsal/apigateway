<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testThatUserCanRegister()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('api/user/register', [
            'name' => 'Olakunle',
            'email' => 'kunsal@email.com',
            'password' => 'admin',
            'confirm_password' => 'admin'
        ]);
        $response->assertOk();
        $this->assertCount(1, User::all());
    }

    public function testThatEmailIsUnique()
    {
        $this->withoutExceptionHandling();
        User::create([
            'name' => 'Olakunle',
            'email' => 'kunsal@email.com',
            'password' => 'admin',
            'confirm_password' => 'admin'
        ]);
        $response = $this->post('api/user/register', [
            'name' => 'Olakunle',
            'email' => 'kunsal@email.com',
            'password' => 'admin',
            'confirm_password' => 'admin'
        ]);
        $response->assertStatus(400);
    }
}
