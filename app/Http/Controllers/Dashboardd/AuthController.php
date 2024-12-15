<?php

namespace App\Http\Controllers\Dashboardd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('dashboard.auth.login');
    }

    public function loginAction(Request $request)
    {
        //
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}