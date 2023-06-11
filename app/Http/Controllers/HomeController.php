<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $breadcrumb = 'Dashboard';

    public function index()
    {
        return view('dashboard.home', [
            'breadcrumb' => $this->breadcrumb
        ]);
    }

    public function nhanVienIndex()
    {
        return view('dashboard.nhanVienHome', [
            'breadcrumb' => 'Home'
        ]);
    }
}
