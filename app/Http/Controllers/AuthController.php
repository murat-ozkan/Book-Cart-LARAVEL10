<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller

{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('authviews.login');
        } else if ($request->method() == 'POST') {
            $data = $request->only('email', 'password');
            // Aşağıdaki satır, Auth::attempt() metodunu kullanarak kullanıcıyı kimlik doğrulamaya çalışır. Auth::attempt() metodu, verilen kimlik bilgilerine sahip bir kullanıcı bulursa true değerini döndürür, aksi takdirde false değerini döndürür.
            if (Auth::attempt($data)) {
                return redirect(route('detail'))->with('login', 'success');
            } else {
                return redirect()->back()->with('login', 'failed');
            }
        }
    }

    public function register(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('authviews.register');
        } else if ($request->method() == 'POST') {
            $data = $request->only('name', 'email', 'password');
            $data['password'] = bcrypt($data['password']);

            User::create($data);

            return redirect(route('login'))->with('register', 'Registered successfully!');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('login'))->with('logout', 'Logged Out!');
    }
}
