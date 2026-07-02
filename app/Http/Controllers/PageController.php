<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function about(): View
    {
        return view('pages.about');
    }

    public function guide(): View
    {
        return view('pages.guide');
    }

    public function team(): View
    {
        $members = [
            ['nama' => '[Nama Anggota 1]', 'nim' => '[NIM Anggota 1]', 'peran' => 'Project Manager', 'kontribusi' => 'Koordinasi tim dan dokumentasi.'],
            ['nama' => '[Nama Anggota 2]', 'nim' => '[NIM Anggota 2]', 'peran' => 'UI/UX Designer', 'kontribusi' => 'Wireframe, prototipe, dan sistem visual.'],
            ['nama' => '[Nama Anggota 3]', 'nim' => '[NIM Anggota 3]', 'peran' => 'Back-end Developer', 'kontribusi' => 'Database, autentikasi, dan CRUD.'],
            ['nama' => '[Nama Anggota 4]', 'nim' => '[NIM Anggota 4]', 'peran' => 'Front-end Developer', 'kontribusi' => 'Blade, Tailwind, dan interaksi.'],
            ['nama' => '[Nama Anggota 5]', 'nim' => '[NIM Anggota 5]', 'peran' => 'Quality Assurance', 'kontribusi' => 'Pengujian fitur dan responsivitas.'],
        ];

        return view('pages.team', compact('members'));
    }
}
