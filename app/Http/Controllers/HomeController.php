<?php

namespace App\Http\Controllers; // <-- Make sure the backslashes are correct

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('layouts.home'); // your home.blade.php
    }
}
