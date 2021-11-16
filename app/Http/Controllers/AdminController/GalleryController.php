<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest\ProductGalleryRequest;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class GalleryController extends Controller
{


    public function index(Product $product)
    {
        return view('admin.galleries.index', [
            'product' => $product,
            'galleies' => Gallery::all(),
        ]);
    }


    public function create()
    {
        //
    }


    public function store(ProductGalleryRequest $request, Product $product)
    {
//      $product->addGallery($request);

        $file = $request->file('file');
        $path = $file->storeAs('public/productGallery', $file->getClientOriginalName());

        $product->galleies()->create([
            'product_id' => $product->id,
            'path' => $path,
            'mimes' => $file->getClientMimeType(),   // show type image
        ]);
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


    public function destroy(Product $product, Gallery $gallery)
    {
//      dd($product->galleies());

        $product->deleteGallery($gallery);
        return back()->with('delete', 'عکس گالری محصول با موفقیت حذف شد');
    }


}
