<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_open_login_and_register_pages(): void
    {
        $this->get(route('login'))->assertOk()->assertSee('Masuk ke akunmu')->assertSee('href="'.route('register').'"', false)->assertDontSee('Masuk Pengelola');
        $this->get(route('register'))->assertOk();
        $this->get(route('home'))->assertOk()->assertSee('href="'.route('login').'" aria-label="Masuk ke akun"', false)->assertDontSee('href="'.route('register').'"', false);
    }

    public function test_user_can_register_and_is_redirected_to_dashboard(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', ['email' => 'budi@example.com', 'role' => 'customer']);
    }

    public function test_user_can_login_and_logout(): void
    {
        $user = User::factory()->create(['password' => 'password123']);

        $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password123',
        ])->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);

        $this->post(route('logout'))->assertRedirect(route('home'));
        $this->assertGuest();
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->create();

        $this->from(route('login'))->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'salah-password',
        ])->assertRedirect(route('login'))->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_admin_cannot_use_customer_login_or_dashboard(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
            'password' => 'password123',
        ]);

        $this->from(route('login'))->post(route('login.store'), [
            'email' => $admin->email,
            'password' => 'password123',
        ])->assertRedirect(route('login'))->assertSessionHasErrors('email');

        $this->assertGuest();
        $this->actingAs($admin)->get(route('dashboard'))->assertRedirect(route('admin.dashboard'));
        $this->get(route('home'))->assertSee('href="'.route('admin.dashboard').'" aria-label="Buka akun', false);
    }

    public function test_guest_cannot_open_dashboard(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }
}
