<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        $title = 'Homepage';
        $userId = Auth::user()->muserName;
        $auth = Auth::check();
        return view('home.index')->with(['title' => $title, 'auth' => $auth, 'userID' => $userId]);
    }
}