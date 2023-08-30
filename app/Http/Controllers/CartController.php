<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total = 0;
        if (session('cart')) {
            foreach ((array) session('cart') as $id => $details) {
                $total += $details['price'] * $details['quantity'];
            }
        }
        return view('frontend.cart.index', ['total' => $total]);
    }

    /**
     * Show the form for creating a new resource.
     */
    function addToCart($id, CartRequest $request)
    {
        $product = Product::find($id);
        $cart = session()->get('cart', []);
        if ($request->quantity > $product->product_quantity) {
            return redirect()->route('shop.product.show', $product->id)->with('error', 'Must select Qty less than Stock Qty');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $cart[$id] = [
                'itemName' => $product->product_name,
                'picture' => $product->product_picture,
                'price' => $product->product_price,
                'quantity' => $request->quantity
            ];
        }
        $product->product_quantity -= $request->quantity;
        $product->save();
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function checkout($total)
    {
        Cart::create(['user_id' => Auth::user()->id]);
        $myCart = Cart::latest()->first();
        if (session('cart')) {
            foreach ((array) session('cart') as $id => $details) {
                CartItem::create([
                    'cart_id' => $myCart->id,
                    'product_id' => $id,
                    'item_quantity' => $details['quantity'],
                    'total_item_price' => $details['quantity'] * $details['price'],
                ]);
            }
            $myCart->total_price = $total;
            $myCart->save();
            Session::forget('cart');
        }
        return redirect()->route('main')->with('success', 'you Checkout successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cartItems = CartItem::where('cart_id', $id)->get();
        return view('frontend.cart.show', compact('cartItems'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $itemQuantity = $cart[$id]['quantity'];
            $product->product_quantity += $itemQuantity;
            $product->save();
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index');
    }
}
