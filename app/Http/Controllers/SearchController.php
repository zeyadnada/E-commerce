<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        $searchBy = $request->input('search_by');
        $searchFor = $request->input('search_for');
        $searchSection = $request->input('search_section');
        if ($searchSection === 'product') {
            $products = Product::where($searchBy, 'LIKE', '%' . $searchFor . '%')->get();
            return view('backend.products.index', compact('products'));
        } elseif ($searchSection === 'category') {
            $categories = Category::where($searchBy, 'LIKE', '%' . $searchFor . '%')->get();
            return view('backend.categoties.index', compact('categories'));
        } elseif ($searchSection === 'user') {
            $users = User::where($searchBy, 'LIKE', '%' . $searchFor . '%')->get();
            return view('backend.users.index', compact('users'));
        } else {
            $products = Product::where('product_name', 'LIKE', '%' . $searchFor . '%')
                ->where('category_id', $searchBy)
                ->get();
            return view('frontend.search', compact('products'));
        }
    }
}
