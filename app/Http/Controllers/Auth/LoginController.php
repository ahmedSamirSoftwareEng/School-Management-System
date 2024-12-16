<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\AuthTrait;

class LoginController extends Controller
{
    use AuthTrait;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }
    public function login(Request $request)
    {
        // return $request;
        // Validate login input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Determine the guard
        $guard = $this->chekGuard($request);
       

        // Attempt login
        if (Auth::guard($guard)->attempt(['email' => $request->email, 'password' => $request->password])) {
            return $this->redirect($request);
        }

        // Redirect back to the login form with the type and error message
        return redirect()->route('login.show', ['type' => $request->type])
            ->withErrors(['email' => 'These credentials do not match our records.'])
            ->withInput($request->only('email', 'type'));
    }

    public function logout(Request $request, $type)
    {
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
