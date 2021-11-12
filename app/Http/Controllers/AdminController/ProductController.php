<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{


    public function index()
    {
        //
    }


    public function create()
    {
        /*$products = Product::all();
        return view('admin.products.create' , compact('products'));*/
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Product $product)
    {
        //
    }


    public function edit(Product $product)
    {
        //
    }


    public function update(Request $request, Product $product)
    {
        //
    }


    public function destroy(Product $product)
    {
        //
    }


}
