<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     *
     *public function __construct()
     *{
     *   $this->middleware('auth:admin');
     *}*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view("product.index")->withProducts($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("product.viewEdit",["product" => $product , "editing" => "false"]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view("product.viewEdit",["product" => $product , "editing" => "true"]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'product.name' => 'required|max:30',
            'product.description' => 'required|max:200',
            'product.price' => 'required|numeric',
            'product.inStock' => 'required|numeric'
            ]);
            
            $product->name = $request->input('product.name');
            $product->description = $request->input('product.description');
            $product->price = $request->input('product.price');
            $product->inStock = $request->input('product.inStock');
            $product->save();


            dd($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
