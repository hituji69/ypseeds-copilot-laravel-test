<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Property;

class InquiryTest extends TestCase
{
    use RefreshDatabase;

    public function test_inquiry_form_displays_correctly(): void
    {
        $property = Property::factory()->create([
            'name' => 'テスト物件',
            'price' => 5000,
            'type' => 'マンション',
            'address' => '東京都渋谷区テスト1-1-1'
        ]);

        $response = $this->get("/inquiry/{$property->id}");

        $response->assertStatus(200);
        $response->assertSee('物件問い合わせ');
        $response->assertSee('テスト物件');
        $response->assertSee('5,000万円');
        $response->assertSee('マンション');
        $response->assertSee('東京都渋谷区テスト1-1-1');
        $response->assertSee('お名前');
        $response->assertSee('電話番号');
        $response->assertSee('メールアドレス');
    }

    public function test_inquiry_form_submission_with_valid_data(): void
    {
        $property = Property::factory()->create();

        $inquiryData = [
            'name' => '山田太郎',
            'phone' => '090-1234-5678',
            'email' => 'yamada@example.com'
        ];

        $response = $this->post("/inquiry/{$property->id}", $inquiryData);

        $response->assertStatus(200);
        $response->assertSee('送信完了しました');
        $response->assertSee('お問い合わせありがとうございます');
    }

    public function test_inquiry_form_validation_required_fields(): void
    {
        $property = Property::factory()->create();

        $response = $this->post("/inquiry/{$property->id}", []);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name', 'phone', 'email']);
    }

    public function test_inquiry_form_validation_email_format(): void
    {
        $property = Property::factory()->create();

        $response = $this->post("/inquiry/{$property->id}", [
            'name' => '山田太郎',
            'phone' => '090-1234-5678',
            'email' => 'invalid-email'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['email']);
    }

    public function test_inquiry_form_preserves_old_input_on_validation_error(): void
    {
        $property = Property::factory()->create();

        $response = $this->post("/inquiry/{$property->id}", [
            'name' => '山田太郎',
            'phone' => '090-1234-5678',
            'email' => 'invalid-email'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('_old_input.name', '山田太郎');
        $response->assertSessionHas('_old_input.phone', '090-1234-5678');
    }

    public function test_inquiry_with_nonexistent_property_returns_404(): void
    {
        $response = $this->get('/inquiry/99999');
        $response->assertStatus(404);

        $response = $this->post('/inquiry/99999', [
            'name' => '山田太郎',
            'phone' => '090-1234-5678',
            'email' => 'yamada@example.com'
        ]);
        $response->assertStatus(404);
    }
}