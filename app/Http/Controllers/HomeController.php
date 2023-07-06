<?php

namespace App\Http\Controllers;

use App\Models\JenisLahan;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $field = JenisLahan::all();
        return view('pages.dashboard.index', compact('user', 'field'));
    }
}
