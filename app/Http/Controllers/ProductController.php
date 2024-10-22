<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller{
    function index(){
        return Product::all();
    }
    function store(Request $request){
        return Product::create($request->all());
    }
    function update(Request $request, Product $product){
        $product->update($request->all());
        return $product;
    }
    function destroy(Product $product){
        $product->delete();
        return $product;
    }
}
