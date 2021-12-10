<?php

namespace App\Http\Controllers;

use App\Models\Metro;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    public function dashboard()
    {
        $metros = Metro::whereBusinessId(Auth::user()->id)->get();
        return view('business.dashboard', ['title' => 'Business Dashboard', 'metros' => $metros]);

    }

    public function dashboard_metro($slug)
    {
        $metro = Metro::whereSlug($slug)->first();
        $products = Product::whereMetroId($metro->id)->where('business_id', '=', Auth::user()->id)->get();

        return view('business.dashboard_products', ['title' => 'Dashboard Products', 'products' => $products, 'metro' => $metro]);
    }

    public function dashboard_product_info($product_slug, $metro_slug)
    {
        $business = User::whereSlug(Auth::user()->slug)->first();
        $metro = Metro::whereSlug($metro_slug)->first();
        $product = Product::whereSlug($product_slug)->first();

        return view('business.product_info', ['title' => 'Product Info', 'business' => $business, 'metro' => $metro, 'product' => $product]);
    }
}
