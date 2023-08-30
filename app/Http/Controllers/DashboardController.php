<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class DashboardController extends Controller
{
    public function index()
    {

        $productCount = Product::count();
        $categoryCount = Category::count();
        $userCount = User::where('is_admin', 0)->count();
        $cartCount = Cart::count();
        return view('backend.dashboard', compact('productCount', 'categoryCount', 'userCount', 'cartCount'));
    }
}