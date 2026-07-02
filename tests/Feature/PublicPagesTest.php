<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicPagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_pages_can_be_opened_after_seeding(): void
    {
        $this->seed();

        $this->get('/')->assertOk()->assertSee('Tuntun Sholat');
        $this->get('/gerakan')->assertOk()->assertSee('Daftar Gerakan Sholat');
        $this->get('/tentang')->assertOk();
        $this->get('/panduan')->assertOk();
        $this->get('/tentang-kami')->assertOk();
    }

    public function test_mode_switch_is_saved_in_session(): void
    {
        $this->seed();
        $category = \App\Models\Kategori::query()->where('slug', 'anak-anak')->firstOrFail();

        $this->get(route('mode.switch', $category))
            ->assertRedirect()
            ->assertSessionHas('mode', 'anak-anak');
    }
}
