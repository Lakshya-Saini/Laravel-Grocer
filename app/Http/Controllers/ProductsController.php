<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Category;
use Session;
use App\User;

class ProductsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('dashboard')->withProducts($user->products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('products.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|integer'
        ]);

        if($request->hasFile('product-image'))
        {
            $file_with_extension = $request->file('product-image')->getClientOriginalName();
            $filename = pathinfo($file_with_extension, PATHINFO_FILENAME);
            $file_extension = $request->file('product-image')->getClientOriginalExtension();
            $filename_to_store = $filename . '_' . time() . '.' . $file_extension;
            $path = $request->file('product-image')->storeAs('public/img', $filename_to_store);
        }
        else{
            $filename_to_store = 'preview.jpg';
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $filename_to_store;
        $product->category_id = $request->category_id;
        $product->user_id = auth()->user()->id;
        $product->save();

        Session::flash('success', 'Product added successfully.');

        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        if(Auth()->user()->id != $product->user_id)
        {
            Session::flash('error', 'You are not allowed to access this product');
            return redirect('dashboard');
        }

        return view('products.show')->withProduct($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        if(Auth()->user()->id != $product->user_id)
        {
            Session::flash('error', 'You are not allowed to edit this product');
            return redirect('dashboard');
        }

        $categories = Category::all();
        return view('products.edit')->withProduct($product)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required|integer'
        ]);

        if($request->hasFile('product-image'))
        {
            $file_with_extension = $request->file('product-image')->getClientOriginalName();
            $filename = pathinfo($file_with_extension, PATHINFO_FILENAME);
            $file_extension = $request->file('product-image')->getClientOriginalExtension();
            $filename_to_store = $filename . '_' . time() . '.' . $file_extension;
            $path = $request->file('product-image')->storeAs('public/img', $filename_to_store);
        }
        else{
            $filename_to_store = 'preview.jpg';
        }

        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $filename_to_store;
        $product->category_id = $request->category_id;
        $product->update();

        Session::flash('success', 'Product updated successfully.');

        return redirect()->route('dashboard');        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::flash('success', 'Product deleted successfully');
        return redirect()->route('dashboard');
    }
}
