<?php

namespace App\Http\Controllers;

//use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AdminAuthController extends Controller
{
    //
    function index ()
    {
        return view('admin.auth.login');
    }

    function doLogin(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            return redirect('/admin/dashboard');
        }

        return back()->with('loginError', 'Email atau Password salah');
    }

    function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('login');
    }

}