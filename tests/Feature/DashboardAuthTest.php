<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_login_page_loads(): void
    {
        $response = $this->get('/dashboard/login');
        
        $response->assertStatus(200);
        $response->assertSee('ログイン');
        $response->assertSee('ユーザ名またはメールアドレス');
        $response->assertSee('パスワード');
        $response->assertSee('rootユーザでログイン');
    }

    public function test_root_user_can_login(): void
    {
        // Mock the environment variable for testing
        $this->app['config']->set('dashboard.password', 'secret123');
        
        $response = $this->post('/dashboard/login', [
            'username' => 'root',
            'password' => 'secret123',
        ]);

        $response->assertRedirect('/dashboard');
        $this->assertTrue(session('dashboard_logged_in'));
        $this->assertEquals('root', session('dashboard_user'));
    }

    public function test_root_user_login_with_wrong_password(): void
    {
        $this->app['config']->set('dashboard.password', 'secret123');

        $response = $this->post('/dashboard/login', [
            'username' => 'root',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHasErrors('username');
        $this->assertFalse(session('dashboard_logged_in'));
    }

    public function test_root_user_can_logout(): void
    {
        // Login as root
        $this->app['config']->set('dashboard.password', 'secret123');
        
        $this->post('/dashboard/login', [
            'username' => 'root',
            'password' => 'secret123',
        ]);

        $this->assertTrue(session('dashboard_logged_in'));

        // Logout
        $response = $this->post('/dashboard/logout');

        $response->assertRedirect('/dashboard/login');
        $this->assertFalse(session('dashboard_logged_in'));
        $this->assertNull(session('dashboard_user'));
    }

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/dashboard/login');
    }

    public function test_dashboard_accessible_when_root_logged_in(): void
    {
        $this->app['config']->set('dashboard.password', 'secret123');
        
        // Login as root
        $this->post('/dashboard/login', [
            'username' => 'root',
            'password' => 'secret123',
        ]);

        $response = $this->get('/dashboard');
        $response->assertStatus(200);
    }
}