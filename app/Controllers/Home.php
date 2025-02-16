<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard', ['title' => 'Dashboard']);
    }
    public function dashboard(): string
    {
        return view('dashboard', ['title' => 'Dashboard']);
    }
    public function about(): string
    {
        return view('about', ['title' => 'About']);
    }
}
