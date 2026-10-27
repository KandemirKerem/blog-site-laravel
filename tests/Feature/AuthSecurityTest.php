<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class AuthSecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_test_mail_route_returns_404(): void
    {
        $response = $this->get('/test');
        $response->assertStatus(404);
    }

    public function test_registration_requires_turnstile_response(): void
    {
        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'turnstile_test@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            // cf-turnstile-response eksik
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
        $this->assertDatabaseMissing('users', [
            'email' => 'turnstile_test@example.com',
        ]);
    }

    public function test_registration_fails_when_turnstile_validation_fails(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => false,
                'error-codes' => ['invalid-input-response'],
            ], 200),
        ]);

        $response = $this->post('/register', [
            'name' => 'Test User',
            'email' => 'turnstile_test2@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'cf-turnstile-response' => 'invalid-dummy-token',
        ]);

        $response->assertSessionHasErrors('cf-turnstile-response');
        $this->assertDatabaseMissing('users', [
            'email' => 'turnstile_test2@example.com',
        ]);
    }

    public function test_registration_succeeds_when_turnstile_passes(): void
    {
        Http::fake([
            'https://challenges.cloudflare.com/turnstile/v0/siteverify' => Http::response([
                'success' => true,
            ], 200),
        ]);

        $response = $this->post('/register', [
            'name' => 'Valid User',
            'email' => 'turnstile_valid@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'cf-turnstile-response' => 'valid-dummy-token',
        ]);

        $response->assertRedirect(route('verification.notice'));
        $this->assertDatabaseHas('users', [
            'email' => 'turnstile_valid@example.com',
        ]);
    }
}
