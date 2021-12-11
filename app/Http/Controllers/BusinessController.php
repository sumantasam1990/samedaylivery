<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Metro;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    private function gen_uniq_order_no($limit)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

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

    public function place_order($metro_slug, $prod_slug)
    {
        $metro = Metro::whereSlug($metro_slug)->select('id')->first();
        $prod = Product::whereSlug($prod_slug)->select('id')->first();
        $dropdown = ['Same Day Delivery', '4 Hour Delivery'];
        return view('business.place_order', ['title' => 'Place a order', 'dropdown' => $dropdown, 'metro' => $metro, 'prod' => $prod]);
    }

    public function place_order_post(Request $request)
    {
        $request->validate([
            'delivery_time' => 'required',
            'c_name' => 'required',
            'c_addr' => 'required',
            'c_zip' => 'required',
            'c_ph' => 'required',
            'c_email' => 'required_without:mobile_no',
            'metro_id' => 'required|numeric',
            'prod_id' => 'required|numeric'
        ]);

        try {
            // insert into customer table
            $customer = new Customer;

            $customer->name = $request->c_name;
            $customer->address = $request->c_addr;
            $customer->zip = $request->c_zip;
            $customer->phone = $request->c_ph;
            $customer->email = $request->c_email;
            $customer->business_id = Auth::user()->id;
            $customer->user_id = 1;
            $customer->metro_id = $request->metro_id;
            $customer->product_id = $request->prod_id;
            $customer->save();

            // insert into order table with customer ID
            $order = new Order;

            $order->product_id = $request->prod_id;
            $order->metro_id = $request->metro_id;
            $order->business_id = Auth::user()->id;
            $order->order_no = $this->gen_uniq_order_no(20);
            $order->customer_id = $customer->id;
            $order->delivery_time = $request->delivery_time;
            $order->status = 0;
            $order->save();

            return back()->with('msg', 'Your Order Has Been Placed Successfully.');
        } catch (\Throwable $th) {
            return back()->with('err', $th->getMessage());
        }


    }


}
