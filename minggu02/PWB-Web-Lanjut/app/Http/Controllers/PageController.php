<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat datang';
    }
    public function about()
    {
        return 'alvin 2341720020';
    }
    public function articles($id)
    {
        return 'halaman dengan id'. $id;
    }
}
