<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('includes/header', ['title' => 'Halaman Utama'])
            . view('dashboard')
            . view('includes/footer');
    }
    public function dashboard(): string
    {
        return view('includes/header', ['title' => 'Halaman Dashboard'])
            . view('dashboard')
            . view('includes/footer');
    }
    public function about(): string
    {
        return view('includes/header', ['title' => 'Halaman Utama'])
            . view('about')
            . view('includes/footer');
    }
}
