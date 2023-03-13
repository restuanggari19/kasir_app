<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LogActivity;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'alpha_dash'],
            'password' => ['required'],
        ]);
    if (Auth::attempt($credentials)) {
        LogActivity::add('berhasil Login');
    }
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->intended('home');
    }
    return back()->withErrors([
        'username' => 'The provided credentials do not match our records.',
    ])->onlyInput('username');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
        LogActivity::add('berhasil Logout');
    }
    public function store(Request $request)
    {
        return to_route('transaksi.show',['transaksi'=>$transaksi->id]);
    }

}
