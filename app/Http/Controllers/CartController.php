<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    // Add a product to the cart
    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity;

        // Check if the user is logged in
        if (Auth::check()) {
            $cartItem = CartItem::firstOrNew([
                'user_id' => Auth::id(),
                'product_id' => $product->id
            ]);
            $cartItem->quantity += $quantity;
            $cartItem->save();
        } else {
            // Handle session cart for guest users
            $cart = session()->get('cart', []);
            if (isset($cart[$product->id])) {
                $cart[$product->id]['quantity'] += $quantity;
            } else {
                $cart[$product->id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $quantity,
                    'image' => $product->img_file,
                    'volume' => $product->volume,
                ];
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    // View the cart
    public function view()
    {
        $cart = [];

        // Load the cart for authenticated users from the database
        if (Auth::check()) {
            $cartItems = CartItem::where('user_id', Auth::id())->with('product')->get();
            foreach ($cartItems as $item) {
                $cart[$item->product_id] = [
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'image' => $item->product->img_file,
                    'volume' => $item->product->volume,
                ];
            }
            session()->put('cart', $cart); // Update session to reflect database
        } else {
            // Use the session cart for guest users
            $cart = session()->get('cart', []);
        }

        // Calculate totals
        $subtotal = array_reduce($cart, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);
        $shipping = 8.95;
        $total = $subtotal + $shipping;

        return view('cart.index', compact('cart', 'subtotal', 'total', 'shipping'));
    }

    // Update cart item quantity
    public function update(Request $request)
    {
        $productId = $request->input('product_id');
        $newQuantity = $request->input('quantity');

        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();
            if ($cartItem) {
                if ($newQuantity > 0) {
                    $cartItem->quantity = $newQuantity;
                    $cartItem->save();
                } else {
                    $cartItem->delete();
                }
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                if ($newQuantity > 0) {
                    $cart[$productId]['quantity'] = $newQuantity;
                    session()->put('cart', $cart);
                } else {
                    unset($cart[$productId]);
                    session()->put('cart', $cart);
                }
            }
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove an item from the cart
    public function remove($productId)
    {
        if (Auth::check()) {
            CartItem::where('user_id', Auth::id())->where('product_id', $productId)->delete();
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$productId])) {
                unset($cart[$productId]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
