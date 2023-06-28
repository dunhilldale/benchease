<?php

namespace Tests\Feature\Auth;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register(): void
    {
        $response = $this->post('/register', [
            'employee_id' => 'testing001',
            'first_name' => 'test_firstname',
            'last_name' => 'test_lastname',
            'email' => 'testing@gmail.com',
            'password' => 'password',
            'confirmed' => 'password',
        ]);

        $this->assertNotNull($response->getCookie('bench_ease_session'));
        // $this->assertAuthenticated();
        // $response->assertRedirect(RouteServiceProvider::HOME);
    }
}
