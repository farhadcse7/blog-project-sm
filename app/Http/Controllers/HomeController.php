<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function adminhome()
    {
        return view('admin.adminhome');
    }

    public function homepage()
    {
        return view('home.homepage');
    }
}
