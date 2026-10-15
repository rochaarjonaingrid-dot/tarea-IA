<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_authentication_forms_render(): void
    {
        $this->get(route('register'))->assertOk()->assertSee('Crear cuenta SIRA');
        $this->get(route('login'))->assertOk()->assertSee('Iniciar sesión');

        $user = User::create([
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'password' => 'password123',
        ]);

        $this->actingAs($user)
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('Guardar cambios');
    }

    public function test_guest_can_register_and_is_logged_in(): void
    {
        $response = $this->post(route('register.store'), [
            'company' => 'Empresa SIRA',
            'rfc' => 'ABC010203XYZ',
            'industry' => 'manufactura',
            'employees' => '1-50',
            'name' => 'Ana',
            'last_name' => 'López',
            'email' => 'ana@example.com',
            'phone' => '5551234567',
            'address' => 'Calle Uno 123',
            'city' => 'Puebla',
            'state' => 'Puebla',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'terms' => '1',
        ]);

        $user = User::where('email', 'ana@example.com')->firstOrFail();
        $response->assertRedirect(route('sira.dashboard'));
        $this->assertAuthenticatedAs($user);
        $this->assertSame('Ana', $user->name);
        $this->assertSame('López', $user->last_name);
        $this->assertSame('Responsable ambiental', $user->role);
        $this->assertTrue(Hash::check('password123', $user->password));
        $this->assertDatabaseHas('company_profiles', [
            'user_id' => $user->id,
            'company_name' => 'Empresa SIRA',
        ]);
    }

    public function test_guest_can_log_in_and_log_out(): void
    {
        $user = User::create([
            'name' => 'Ana',
            'last_name' => 'López',
            'email' => 'ana@example.com',
            'password' => 'password123',
        ]);

        $this->post(route('login.authenticate'), [
            'email' => $user->email,
            'password' => 'password123',
        ])->assertRedirect(route('sira.dashboard'));

        $this->assertAuthenticatedAs($user);

        $this->post(route('logout'))
            ->assertRedirect(route('login'))
            ->assertSessionHas('status', 'La sesión se cerró correctamente.');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_update_profile_and_password(): void
    {
        $user = User::create([
            'name' => 'Ana',
            'last_name' => 'López',
            'email' => 'ana@example.com',
            'password' => 'password123',
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Ana María',
                'last_name' => 'López Pérez',
                'email' => 'ana@example.com',
                'phone' => '5551234567',
                'role' => 'Responsable ambiental',
                'current_password' => 'password123',
                'new_password' => 'new-password123',
                'new_password_confirmation' => 'new-password123',
            ])
            ->assertRedirect(route('profile.edit'))
            ->assertSessionHas('status');

        $user->refresh();

        $this->assertSame('Ana María', $user->name);
        $this->assertSame('López Pérez', $user->last_name);
        $this->assertSame('Responsable ambiental', $user->role);
        $this->assertTrue(Hash::check('new-password123', $user->password));
    }

    public function test_profile_routes_require_authentication(): void
    {
        $this->get(route('profile.edit'))->assertRedirect(route('login'));
        $this->put(route('profile.update'))->assertRedirect(route('login'));
    }

    public function test_non_admin_cannot_promote_themselves_to_admin(): void
    {
        $user = User::create([
            'name' => 'Ana',
            'last_name' => 'López',
            'email' => 'ana@example.com',
            'password' => 'password123',
            'role' => 'Responsable ambiental',
        ]);

        $this->actingAs($user)
            ->put(route('profile.update'), [
                'name' => 'Ana',
                'last_name' => 'López',
                'email' => 'ana@example.com',
                'role' => 'Administrador de empresa',
            ])
            ->assertSessionHasErrors('role');

        $this->assertSame('Responsable ambiental', $user->fresh()->role);
    }

}
