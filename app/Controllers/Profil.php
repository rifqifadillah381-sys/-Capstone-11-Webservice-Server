<?php

namespace App\Controllers;

class Profil extends BaseController
{
    public function index()
    {
        // Pastikan session sudah ada saat login
        $data = [
            'username'    => 'Rifqi',
            'role'        => 'admin',
            'email'       => '111202415818@mhs.dinus.ac.id',
            'waktu_login' => session()->get('logged_at') ?? date('2026-04-28 11:30:20'),
            'status'      => 'Sudah Login'
        ];

        return view('v_profil', $data);
    }
}