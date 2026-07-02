<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_page_requires_authentication(): void
    {
        $this->get('/admin')->assertRedirect('/admin/login');
    }

    public function test_seeded_admin_can_login(): void
    {
        $this->seed();

        $this->post('/admin/login', [
            'email' => 'admin@tuntunsholat.test',
            'password' => 'password123',
        ])->assertRedirect('/admin');
    }
}
