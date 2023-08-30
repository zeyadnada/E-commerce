<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{


    function index()
    {
        $categories = Category::get();
        return view('frontend.shop.index', compact('categories'));
    }

    function show($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $id)->get();
        return view('frontend.shop.show', compact('category', 'products'));
    }


    function showProduct($id)
    {
        $product = Product::find($id);
        return view('frontend.shop.showProduct', compact('product'));
    }
}