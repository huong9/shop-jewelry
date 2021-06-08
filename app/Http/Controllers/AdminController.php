<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{

    public function index()
    {
        # code...
        return view('admin.index');
    }
    public function login()
    {
        session(['link' => url()->previous()]);
        $check_login = Auth::check();
        if ($check_login) {
            # code...
            return redirect()->back()->with('success', 'You are logged in!');
        }
        return view('admin.account.login');
        # code...
    }

    public function p_login(LoginRequest $req)
    {
        $data = [
            'email' => request('email'),
            'password' => request('password')
        ];
        $remember = true;
        $check_login = Auth::attempt($data, $remember);
        if ($check_login) {
            return redirect(session('link'))->with('success', 'Logged in successfully!');
        }
        return redirect()->back()->with('error', 'Login failed!');
    }

    public function register()
    {
        $check_login = Auth::check();
        session(['link' => url()->previous()]);
        if ($check_login) {
            # code...
            return redirect()->back();
        }
        return view('admin.account.register');
        # code...
    }
    public function p_register(RegisterRequest $UReq)
    {
        $add = User::dangki();
        $remember = true;
        // $check_login = Auth::attempt($data, $remember);
        if ($add) {
            # code...
            return redirect(session('link'))->with('success', 'Success!');
        }
        return redirect()->back()->with('error', 'Failure!');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function error()
    {
        $code = request()->code;
        return view('admin.error');
    }
}
