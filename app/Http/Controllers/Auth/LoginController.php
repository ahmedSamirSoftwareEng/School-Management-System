<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function loginForm($type)
    {

        return view('auth.login', compact('type'));
    }
    public function login(Request $request)
    {
        return $request->all();
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
