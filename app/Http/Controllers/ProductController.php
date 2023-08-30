<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\traits\media;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Models\Category;

class ProductController extends Controller

{
    use media;

    function index()
    {
        $products = Product::get();
        return view('backend.products.index', compact('products'));
    }
    //////////////////////////////////////////////////////////////////////////////////
    function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('backend.products.show', compact('product'));
    }
    ////////////////////////////////////////////////////////////////////////
    function create()
    {
        $categories = Category::get();
        return view('backend.products.create', compact('categories'));
    }
    //////////////////////////////////////////////////////////////////////////////////

    function store(ProductRequest $request)
    {
        $data = $request->except('product_picture');
        if ($request->has('product_picture')) {
            $imageName = $this->uploadImage($request->product_picture);
            $data['product_picture'] = $imageName;
        }
        product::create($data);
        return redirect()->route('products.index');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////

    function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::get();
        return view('backend.products.edit', compact('product', 'categories'));
    }
    /////////////////////////////////////////////////////////////////////////////////////////////

    function update($id, ProductRequest $request)
    {
        $product = product::find($id);
        $data = $request->except('product_picture');
        if ($request->has('product_picture')) {
            //delete old photo
            $oldImageName = $product->product_picture;
            if ($oldImageName) {
                $photoPath = public_path('images') . '\\' . $oldImageName;
                $this->deletePhoto($photoPath);
            }
            //upload new
            $newImageName = $this->uploadImage($request->product_picture);
            $data['product_picture'] = $newImageName;
        }
        $product->update($data);
        return redirect()->route('products.index');
    }
    ///////////////////////////////////////////////////////////////////////////////////////////////
    function destroy($id)
    {
        $product = Product::find($id);
        $imageName = $product->product_picture;
        if ($imageName) {
            $photoPath = public_path('images') . '\\' . $imageName;
            $this->deletePhoto($photoPath);
        }
        $product->delete();
        return redirect()->route('products.index');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////
}
