<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chefauthController extends Controller
{
    public function index()
{
    return view('chef.dashboard'); // User-specific dashboard
}
}
