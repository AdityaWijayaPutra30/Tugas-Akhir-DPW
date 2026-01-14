<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ForgotPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_forgot_password_success()
    {
        // Create a user
        $user = User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@gmail.com',
            'password' => Hash::make('oldpassword'),
            'role' => 'user'
        ]);

        // Post request to forgot password
        $response = $this->post('/forgot-password', [
            'username' => 'testuser',
            'email' => 'test@gmail.com',
            'password_baru' => 'newpassword123'
        ]);

        $response->assertRedirect('/login');
        $response->assertSessionHas('success');

        // Refresh user and check password
        $user->refresh();
        $this->assertTrue(Hash::check('newpassword123', $user->password));
    }

    public function test_forgot_password_invalid_user()
    {
        $response = $this->post('/forgot-password', [
            'username' => 'nonexistent',
            'email' => 'wrong@gmail.com',
            'password_baru' => 'newpassword123'
        ]);

        $response->assertSessionHas('error');
    }
}
