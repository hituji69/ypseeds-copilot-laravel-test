<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_requires_authentication(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');
    }

    public function test_dashboard_loads_for_authenticated_user(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('ダッシュボード');
        $response->assertSee('物件管理');
        $response->assertSee('問い合わせ管理');
        $response->assertSee('ユーザ管理');
        $response->assertSee('システム設定');
    }

    public function test_dashboard_sidebar_navigation(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard');
        
        $response->assertStatus(200);
        $response->assertSee('物件');
        $response->assertSee('問い合わせ');
        $response->assertSee('ユーザ');
        $response->assertSee('設定');
        $response->assertSee('ログアウト');
    }

    public function test_dashboard_properties_page(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard/properties');
        
        $response->assertStatus(200);
        $response->assertSee('物件管理');
    }

    public function test_dashboard_inquiries_page(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard/inquiries');
        
        $response->assertStatus(200);
        $response->assertSee('問い合わせ管理');
    }

    public function test_dashboard_users_page(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard/users');
        
        $response->assertStatus(200);
        $response->assertSee('ユーザ管理');
    }

    public function test_dashboard_settings_page(): void
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard/settings');
        
        $response->assertStatus(200);
        $response->assertSee('システム設定');
    }
}