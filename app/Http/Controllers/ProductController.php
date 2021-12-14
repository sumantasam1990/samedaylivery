<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Metro;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function add_product($metro_slug)
    {
        $metro = Metro::whereSlug($metro_slug)->where('business_id', '=', Auth::user()->id)->first();

        return view('products.add_product', ['title' => 'Add Product', 'metro' => $metro]);
    }

    public function product_insert(Request $request)
    {
        $request->validate([
            'prod.*' => 'required',
            'metro' => 'required'
        ]);

        try {


            foreach ($request->prod as $prod)
            {
                $product = new Product;

                $product->metro_id = $request->metro;
                $product->business_id = Auth::user()->id;
                $product->user_id = 1;
                $product->name = $prod;
                $product->save();
            }

            return back()->with('msg', 'Product has been added successfully.');
        } catch (\Throwable $th) {
            return back()->with('err', 'Error!' . $th->getMessage());
        }

    }

    public function current_orders($prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->first();
        $orders = DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.id')->where('orders.status', '=', 0)->where('orders.business_id', '=', Auth::user()->id)->where('orders.product_id', '=', $product->id)->get();

        return view('orders.current_orders', ['title' => 'Current Orders', 'orders' => $orders, 'product' => $product]);

    }

    public  function past_orders($prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->first();
        $orders = DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.id')->where('orders.status', '=', 1)->where('orders.business_id', '=', Auth::user()->id)->where('orders.product_id', '=', $product->id)->get();

        return view('orders.past_orders', ['title' => 'Past Orders', 'orders' => $orders, 'product' => $product]);
    }

    public function send_inventory($metro_slug, $prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->where('business_id', '=', Auth::user()->id)->first();

        return view('inventory.send', ['title' => 'Send Inventory', 'product' => $product]);
    }

    public function send_inventory_insert(Request $request)
    {
        $request->validate([
            'shipping' => 'required|date',
            'product' => 'required',
            'units' => 'required',
            'tracking' => 'required',
            'delivery' => 'required',
        ]);

        try {
            $inventory = new Inventory;

            $inventory->product_id = $request->product;
            $inventory->business_id = Auth::user()->id;
            $inventory->user_id = 1;
            $inventory->units = $request->units;
            $inventory->tracking = $request->tracking;
            $inventory->delivery = $request->delivery;
            $inventory->shipping = $request->shipping;
            $inventory->save();

            return back()->with('msg', 'Inventory has been added successfully.');
        } catch (\Throwable $th) {
            return back()->with('err', 'Error!' . $th->getMessage());
        }
    }

    public function inventory($metro_slug, $prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->where('business_id', '=', Auth::user()->id)->first();

        $inventory = Inventory::whereProductId($product->id)->where('business_id', '=', Auth::user()->id)->where('user_id', '=', 1)->get();

        return view('inventory.inventory', ['title' => 'Inventory', 'product' => $product, 'inventory' => $inventory]);
    }

    public function retailer_inventory($metro_slug, $prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->where('user_id', '=', Auth::user()->id)->first();
        $inventory = Inventory::whereProductId($product->id)->where('user_id', '=', Auth::user()->id)->get();

        return view('inventory.inventory', ['title' => 'Inventory', 'product' => $product, 'inventory' => $inventory]);
    }

    public function retailer_past_orders($prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->first();
        $orders = DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.id')->where('orders.status', '=', 1)->where('orders.product_id', '=', $product->id)->get();

        return view('orders.past_orders', ['title' => 'Past Orders', 'orders' => $orders, 'product' => $product]);
    }

    public function retailer_current_orders($prod_slug)
    {
        $product = Product::whereSlug($prod_slug)->first();
        $orders = DB::table('orders')->join('customers', 'orders.customer_id', '=', 'customers.id')->where('orders.status', '=', 0)->where('orders.product_id', '=', $product->id)->get();

        return view('orders.current_orders', ['title' => 'New Orders', 'orders' => $orders, 'product' => $product]);
    }

    public function retailer_order_delivered(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate(['ord' => 'required']);

        try {
            Order::where("order_no", $request->ord)->update(["status" => 1]);

            return back()->with('msg', 'You have successfully marked as delivered.');
        } catch (\Throwable $th) {
            return back()->with('err', 'Error! ' . $th->getMessage());
        }
    }
}
