<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class EmailVerificationMailTest extends TestCase
{
    use RefreshDatabase;

    public function test_custom_verification_email_contains_user_name_and_url(): void
    {
        $user = User::factory()->create([
            'name' => 'Kerem Kandemir',
            'email' => 'kerem@example.com',
            'email_verified_at' => null,
        ]);

        $notification = new VerifyEmail();
        $mail = $notification->toMail($user);

        $this->assertEquals('NovaBlog - E-posta Adresinizi Doğrulayın', $mail->subject);
        $this->assertEquals('mail.verify-email', $mail->view);
        $this->assertEquals('Kerem Kandemir', $mail->viewData['user']->name);
        $this->assertNotEmpty($mail->viewData['url']);

        $rendered = $mail->render();
        $this->assertStringContainsString('NovaBlog', (string)$rendered);
        $this->assertStringContainsString('Kerem Kandemir', (string)$rendered);
        $this->assertStringContainsString('E-posta Adresimi Doğrula', (string)$rendered);
    }
}
