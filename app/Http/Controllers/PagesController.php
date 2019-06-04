<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Order;
use Session;

class PagesController extends Controller
{
    public function home() 
    {
    	$products = Product::all();
    	$categories = Category::paginate(10);
    	return view('pages.home')->withProducts($products)->withCategories($categories);
    }

    public function buy($id) 
    {
    	$product = Product::find($id);
    	return view('pages.buy')->withProduct($product);
    }

    public function checkout($id) 
    {
    	$product = Product::find($id);
    	return view('pages.checkout')->withProduct($product);
    }

    public function order(Request $request, $id)
    {
    	$this->validate($request, [
    		'name' => 'required|max:255',
    		'email' => 'required|email|min:5|max:255',
    		'address' => 'required|max:191',
    		'number' => 'required|integer'
    	]);

    	$token = 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPMNBVCZXALSKDJGF1234098675!$/()*';
		$token = str_shuffle($token);
		$token = substr($token, 0, 10);

    	$product = Product::find($id); 

    	$order = new Order();
    	$order->product_name = $product->name;
    	$order->user_name = $request->name;
    	$order->email = $request->email;
    	$order->address = $request->address;
    	$order->number = $request->number;
    	$order->qty = 1;
    	$order->amount = 90;
    	$order->token = $token;
    	$order->save();

    	Session::flash('success', 'Order Placed Successfully');

    	return view('pages.order')->withOrder($order);

    }

    public function singleCategory($id) 
    {
        $category = Category::find($id);
        return view('pages.singleCategory')->withCategory($category);
    }

}
