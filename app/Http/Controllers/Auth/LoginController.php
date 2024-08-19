<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return back()->with("err", "Anda sudah login");
        } else {
            return view('auth.login');
        }
    }

    public function auth(Request $request)
    {
        $request->validate([
            'npwp' => 'required',
            'password' => 'required'
        ]);

        $user = User::where('npwp', $request->npwp)->first();
        
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $user->last_login = now();
                $user->save();

                Auth::login($user);
                return redirect('/dashboard');
            } else {
                return back()->with("err", "Wrong Password");
            }
        } else {
            return back()->with("err", "npwp tidak ditemukan");
        }

    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
