<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class PropertyDetailTest extends TestCase
{
    use RefreshDatabase;

    public function test_property_detail_page_loads_successfully(): void
    {
        // Create a test property
        $property = Property::factory()->create([
            'name' => 'テスト物件',
            'description' => 'これはテスト用の物件説明です。',
            'equipment_conditions' => 'エアコン完備、オートロック',
            'price' => 5000,
            'area' => 'shibuya'
        ]);

        $response = $this->get("/property/{$property->id}");

        $response->assertStatus(200);
        $response->assertSee('テスト物件');
        $response->assertSee('5,000万円');
        $response->assertSee('これはテスト用の物件説明です。');
        $response->assertSee('エアコン完備、オートロック');
    }

    public function test_property_detail_contains_inquiry_link(): void
    {
        $property = Property::factory()->create();

        $response = $this->get("/property/{$property->id}");

        $response->assertStatus(200);
        $response->assertSee("/inquiry/{$property->id}");
        $response->assertSee('物件問い合わせ');
    }

    public function test_property_detail_contains_back_link(): void
    {
        $property = Property::factory()->create(['area' => 'shibuya']);

        $response = $this->get("/property/{$property->id}");

        $response->assertStatus(200);
        $response->assertSee("/list/shibuya");
        $response->assertSee('一覧に戻る');
    }

    public function test_property_not_found_returns_404(): void
    {
        $response = $this->get('/property/99999');

        $response->assertStatus(404);
    }
}
