<?php

namespace App\Http\Controllers\Dashbord;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('dashbord.products.index')->withProducts($products);
    }

    public function show(Product $product)
    {
        return view("dashbord.products.show")->withProduct($product);
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'product.name' => 'required|max:255',
            'product.description' => 'required|max:255',
            'product.price' => 'required|numeric',
            'product.stock' => 'required|numeric'
        ]);

        $product->name = $request->input('product.name');
        $product->description = $request->input('product.description');
        $product->price = $request->input('product.price');
        $product->stock = $request->input('product.stock');
        $product->save();

        return response(201);
    }
}
