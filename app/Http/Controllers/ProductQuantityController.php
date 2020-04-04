<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductQuantityController extends Controller
{
    /**
     * Update item in stock the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateInStock(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $this->validate($request,[
            'itemInStock' => 'required|numeric'
        ]);

        $product->inStock = $request->itemInStock;
        $product->save();


        return "done";
    }
}
