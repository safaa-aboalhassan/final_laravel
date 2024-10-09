<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class witterauthauthController extends Controller
{
    public function index()
{
    return view('witter.dashboard'); // Admin-specific dashboard
}
}
