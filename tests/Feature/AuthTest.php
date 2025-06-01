<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_loads(): void
    {
        $response = $this->get('/dashboard/login');
        
        $response->assertStatus(200);
        $response->assertSee('ログイン');
        $response->assertSee('ユーザ名またはメールアドレス');
        $response->assertSee('パスワード');
    }

    public function test_register_page_loads(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard/register');
        
        $response->assertStatus(200);
        $response->assertSee('アカウント作成');
        $response->assertSee('名前');
        $response->assertSee('メールアドレス');
        $response->assertSee('パスワード');
    }

    public function test_user_can_register(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->post('/dashboard/register', [
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticated();
    }

    public function test_user_can_login(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);

        $response = $this->post('/dashboard/login', [
            'username' => 'test@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();
        
        $this->actingAs($user);
        
        $response = $this->post('/logout');
        
        $response->assertRedirect('/');
        $this->assertGuest();
    }

    public function test_login_with_invalid_credentials(): void
    {
        $response = $this->post('/dashboard/login', [
            'username' => 'invalid@example.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertGuest();
    }

    public function test_register_page_requires_authentication(): void
    {
        $response = $this->get('/dashboard/register');
        $response->assertRedirect('/dashboard/login');
    }
}