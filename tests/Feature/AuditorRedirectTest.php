<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuditorRedirectTest extends TestCase
{
    use RefreshDatabase;

    public function test_auditor_login_redirects_to_auditor_dashboard()
    {
        $password = 'testpassword123';

        $user = User::create([
            'email' => 'auditor@example.com',
            'password_hash' => Hash::make($password),
            'role' => 'Auditor',
            'status' => 2,
            'created_at' => now(),
            'last_login' => now(),
        ]);

        $response = $this->post(route('login.process'), [
            'email' => 'auditor@example.com',
            'password' => $password,
        ]);

        $response->assertRedirect(route('auditor.dashboard'));
    }
}
