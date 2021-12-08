<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check()){
            return redirect()->route('retailer.dashboard');
        }
        return view('auth.login', ["title" => "Login"]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            if (Auth::user()->user_type == 'Administrator')
            {
                return redirect()->intended('admin/dashboard');
            } elseif (Auth::user()->user_type == 'retailer') {
                return redirect()->route('retailer.dashboard');
            } else {
                return redirect()->route('retailer.dashboard');


            }


        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function registration()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.register', ["title" => "Create an account"]);
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',

        ]);

        $data = $request->all();

        $user = $this->create($data);

        event(new Registered($user));

        return redirect("login")->with('msg', '<p>Please confirm your email to complete the sign up process. </p> <p>We have emailed you a verification</p> <p>Thank you</p> <p>Team Scorng</p>');
    }

    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function dashboard()
    {
        return view('auth.dashboard', ['title' => 'Dashboard']);
    }
}
