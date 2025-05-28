<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /**
     * お問い合わせフォームが表示されることをテスト
     */
    public function test_contact_form_displays_correctly(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
        $response->assertSee('お問い合わせフォーム');
        $response->assertSee('名前');
        $response->assertSee('メールアドレス');
        $response->assertSee('お問い合わせ内容');
    }

    /**
     * バリデーションエラーのテスト
     */
    public function test_contact_form_validation_errors(): void
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }

    /**
     * メール形式のバリデーションテスト
     */
    public function test_contact_form_email_validation(): void
    {
        $response = $this->post('/contact', [
            'name' => 'テスト太郎',
            'email' => 'invalid-email',
            'message' => 'テストメッセージ'
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    /**
     * 正常送信のテスト
     */
    public function test_contact_form_successful_submission(): void
    {
        $response = $this->post('/contact', [
            'name' => 'テスト太郎',
            'email' => 'test@example.com',
            'message' => 'これはテストメッセージです。'
        ]);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success', 'お問い合わせを受け付けました');
    }
}