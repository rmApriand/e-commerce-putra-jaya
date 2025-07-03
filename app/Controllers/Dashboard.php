<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(): string
    {
        return view('template/header')
        .view ('dashboard/dashboard')
        .view ('template/footer');
    }
}
