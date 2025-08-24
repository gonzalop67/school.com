<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function login()
    {
        // echo Hash::make(123456);
        // die;

        return view('auth.login');
    }

    public function auth_login(Request $request)
    {
        // $remember = !empty($request->remember);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_delete' => 0], true)) {
            if (Auth::user()->is_admin == 5) {
                return redirect('teacher/dashboard');
            } else if (Auth::user()->is_admin == 6) {
                return redirect('student/dashboard');
            } else if (Auth::user()->is_admin == 7) {
                return redirect('parent/dashboard');
            } else {
                return redirect('panel/dashboard');
            }
        } else {
            return redirect()->back()->with('error', "Please enter correct email and password");
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function forgot()
    {
        return view('auth.forgot');
    }
}
