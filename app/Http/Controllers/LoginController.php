<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Metro;
use App\Models\Order;
use App\Models\Product;
use App\Models\Subscriber;
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

        return abort('404');
        //return view('auth.login', ["title" => "Login"]);
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

    public function registration_lead()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return view('auth.lead', ["title" => "Register With Us"]);
    }


    public function customRegistration_lead(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:subscribers',
            'b_name' => 'required',
            'phone' => 'required'

        ]);

        $subscriber = new Subscriber;

        $subscriber->name = $request->name;
        $subscriber->business = $request->b_name;
        $subscriber->email = $request->email;
        $subscriber->phone = $request->phone;
        $subscriber->save();

        return back()->with('msg', '<h4>Thank you for subscribe us. We will send you an invitation link to your email.</h4>');
    }

    public function registration()
    {
        if(Auth::check()){
            return redirect('/dashboard');
        }

        return abort('404');
        //return view('auth.register', ["title" => "Create an account"]);
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
            'password' => Hash::make($data['password']),
            'user_type' => 'business'
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

        $orders_current = Order::whereProductId($product->id)->where('status', '=', 0)->get();
        $orders_past = Order::whereProductId($product->id)->where('status', '=', 1)->get();
        $inventory = Inventory::whereProductId($product->id)->where('user_id', '=', Auth::user()->id)->get();

        return view('auth.product_info', ['title' => 'Product Info', 'business' => $business, 'metro' => $metro, 'product' => $product, 'orders_past' => $orders_past, 'inventory' => $inventory, 'orders_current' => $orders_current]);
    }


}
