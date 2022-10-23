<?php

namespace App\Http\Controllers;

use App\Models\customerdata;
use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::all();
        return view('home', compact('products'));
    }
    public function custview($id)
    {
        $product = Products::find($id);
        return view('customer.view', compact('product'));
    }
    public function cart()
    {

        return view('customer.cart');
    }
    public function checkout()
    {

        return view('customer.checkout');
    }
    public function storeit(Request $request)
    {
        $total = 0;
        $prods = '';
        // to find total and all products names
        if (session('cart')) {
            foreach (session('cart') as $id => $details) {
                $total = $total + $details['price'];
                $prods = $prods . '' . $details['name'] . ',';
            }
        }

        // to store customer data for purchase
        $cdata = new customerdata();
        $cdata->name = $request->input('name');
        $cdata->address = $request->input('address');
        $cdata->phone = $request->input('phone');
        $cdata->product_names = $prods;
        $cdata->totalprice = $total;
        $cdata->save();
        session()->forget('cart'); // to clear cart items
        return redirect('/home/cart')->with('status', 'Details added');
    }
    public function addcart($id)
    {
        $product = Products::find($id);
        // session
        $cart = session()->get('cart');

        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "img" => $product->img
        ];

        session()->put('cart', $cart); // putting the selected products data to session
        return redirect()->back()->with('status', 'Product added to cart Succesfully');
    }
}
