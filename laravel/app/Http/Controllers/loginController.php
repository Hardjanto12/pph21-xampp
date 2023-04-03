<?php

namespace App\Http\Controllers;

use App\Models\mUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{


    public function index()
    {

        $title = "Login Page";
        return view('auth.partials.login', ['title' => $title]);
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }

    public function authenticate(Request $request)
    {
        // try {
        $validated = $request->validate([
            'muserName' => 'required',
            'muserPwd' => 'required'
        ]);

        // print_r($validated);
        $isAuth = Auth::attempt(
            [
                'muserName' => $validated['muserName'],
                'password' => $validated['muserPwd']
            ]
        );

        if ($isAuth) {
            return redirect('home');
        } else {
            return back()->withErrors([
                'muserName' => 'Username atau password salah!',
            ])->onlyInput('muserName');
        }
        // } catch (\Throwable $th) {
        //     return back()->withErrors([])->onlyInput('muserName');
        // }
    }
}
