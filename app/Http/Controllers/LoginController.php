<?php

namespace App\Http\Controllers;

use App\Models\Metro;
use App\Models\Product;
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
            if(Auth::user()->user_type == 'business') {
                return redirect()->route('business.dashboard');
            } else {
                return redirect()->route('retailer.dashboard');
            }

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
                return redirect()->route('business.dashboard');


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
        $business = User::where('user_type', '=', 'business')->get();
        return view('auth.dashboard', ['title' => 'Dashboard', 'business' => $business]);
    }

    public function dashboard_metro($slug)
    {
        $business = User::whereSlug($slug)->first();
        $metros = Metro::where('user_id', '=', Auth::user()->id)->where('business_id', '=', $business->id)->get();

        return view('auth.dashboard_metro', ['title' => 'Dashboard Metros', 'business' => $business, 'metros' => $metros]);
    }

    public function dashboard_product($slug, $metro_slug)
    {
        $business = User::whereSlug($slug)->first();
        $metro = Metro::whereSlug($metro_slug)->first();
        $products = Product::whereMetroId($metro->id)->where('business_id', '=', $business->id)->get();

        return view('auth.dashboard_product', ['title' => 'Dashboard Products', 'business' => $business, 'metro' => $metro, 'products' => $products]);
    }

    public function dashboard_product_info($product_slug, $metro_slug, $business_slug)
    {
        $business = User::whereSlug($business_slug)->first();
        $metro = Metro::whereSlug($metro_slug)->first();
        $product = Product::whereSlug($product_slug)->first();

        return view('auth.product_info', ['title' => 'Product Info', 'business' => $business, 'metro' => $metro, 'product' => $product]);
    }
}
