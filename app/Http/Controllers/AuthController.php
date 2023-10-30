<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('authviews.login');
        }
        else if ($request->method() == 'POST') {   
            $data = $request->only('email', 'password');
            if (Auth::attempt($data)) {
                echo "login success";
                return redirect(route('home'))->with('login', 'success');
            } else {
                echo "login failed";
                return redirect()->back()->with('login', 'failed');
            }
        }
    }

    public function register(Request $request)
    {
    }
}