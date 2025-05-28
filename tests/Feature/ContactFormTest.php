<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactFormTest extends TestCase
{
    /**
     * Test that the contact form page loads successfully.
     */
    public function test_contact_form_page_loads()
    {
        $response = $this->get('/contact');
        
        $response->assertStatus(200);
        $response->assertSee('お問い合わせフォーム');
        $response->assertSee('お名前');
        $response->assertSee('メールアドレス');
        $response->assertSee('お問い合わせ内容');
    }

    /**
     * Test successful contact form submission.
     */
    public function test_contact_form_submission_success()
    {
        $formData = [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'message' => 'これはテストメッセージです。'
        ];

        $response = $this->post('/contact', $formData);

        $response->assertRedirect('/contact');
        $response->assertSessionHas('success', 'お問い合わせを受け付けました');
    }

    /**
     * Test contact form validation - missing name.
     */
    public function test_contact_form_validation_missing_name()
    {
        $formData = [
            'name' => '',
            'email' => 'test@example.com',
            'message' => 'これはテストメッセージです。'
        ];

        $response = $this->post('/contact', $formData);

        $response->assertSessionHasErrors('name');
    }

    /**
     * Test contact form validation - invalid email.
     */
    public function test_contact_form_validation_invalid_email()
    {
        $formData = [
            'name' => 'テストユーザー',
            'email' => 'invalid-email',
            'message' => 'これはテストメッセージです。'
        ];

        $response = $this->post('/contact', $formData);

        $response->assertSessionHasErrors('email');
    }

    /**
     * Test contact form validation - missing message.
     */
    public function test_contact_form_validation_missing_message()
    {
        $formData = [
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'message' => ''
        ];

        $response = $this->post('/contact', $formData);

        $response->assertSessionHasErrors('message');
    }

    /**
     * Test contact form validation - all fields missing.
     */
    public function test_contact_form_validation_all_fields_missing()
    {
        $response = $this->post('/contact', []);

        $response->assertSessionHasErrors(['name', 'email', 'message']);
    }
}