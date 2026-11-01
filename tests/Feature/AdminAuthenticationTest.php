<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_view_admin_login_page(): void
    {
        $response = $this->get(route('admin.login'));
        $response->assertOk();
        $response->assertSee('Masuk Pengelola');
        $response->assertSee('admin@nirmala.com');
    }

    public function test_admin_can_login_with_valid_credentials_and_reach_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@nirmala.com',
            'role' => 'admin',
            'password' => 'admin123',
        ]);

        $response = $this->post(route('admin.login.store'), [
            'email' => 'admin@nirmala.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);

        $dashboardResponse = $this->get(route('admin.dashboard'));
        $dashboardResponse->assertOk();
        $dashboardResponse->assertSee('Portal Pengelola');
        $dashboardResponse->assertSee($admin->name);
    }

    public function test_customer_user_is_rejected_from_admin_login(): void
    {
        $customer = User::factory()->create([
            'email' => 'customer@example.com',
            'role' => 'customer',
            'password' => 'password123',
        ]);

        $response = $this->from(route('admin.login'))->post(route('admin.login.store'), [
            'email' => 'customer@example.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect(route('admin.login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_guest_cannot_access_admin_dashboard(): void
    {
        $response = $this->get(route('admin.dashboard'));
        $response->assertRedirect(route('admin.login'));
    }

    public function test_customer_cannot_access_admin_dashboard(): void
    {
        $customer = User::factory()->create([
            'role' => 'customer',
        ]);

        $response = $this->actingAs($customer)->get(route('admin.dashboard'));
        $response->assertRedirect(route('dashboard'));
    }

    public function test_admin_can_logout(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($admin);
        $this->assertAuthenticatedAs($admin);

        $response = $this->post(route('admin.logout'));
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }

    public function test_authenticated_admin_is_redirected_away_from_admin_login(): void
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get(route('admin.login'));
        $response->assertRedirect(route('admin.dashboard'));
    }
}
