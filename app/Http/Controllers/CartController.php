<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    public function add(Request $request)
    {
        // Validate request data
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Get the product and requested quantity
        $product = Product::find($request->product_id);
        $quantity = $request->quantity;

        // Retrieve current cart from session or create a new array if it doesn't exist
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$product->id])) {
            // Update the quantity if it already exists
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            // Add the new product to the cart
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantity,
                'image' => $product->img_file,
                'volume' => $product->volume
            ];
        }

        // Update the cart in the session
        session()->put('cart', $cart);

        // Redirect back to the product page with success message
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $subtotal = 0;
    
        // Loop through the cart items to calculate subtotal
        foreach ($cart as $productId => $cartItem) {
            $product = Product::find($productId);
            
            if ($product) {
                // Add image path to cart item for display purposes
                $cart[$productId]['img_file'] = $product->img_file;
                $cart[$productId]['name'] = $product->name;
                $cart[$productId]['price'] = $product->price;
    
                // Calculate the item's total cost (price * quantity)
                $itemTotal = $product->price * $cartItem['quantity'];
                $subtotal += $itemTotal;
    
                // Store the item total in the cart for display
                $cart[$productId]['item_total'] = $itemTotal;
            }
        }
    
        // Define additional costs
        $shipping = 8.95;
        $total = $subtotal + $shipping;
    
        // Pass updated cart, subtotal, and total to the view
        return view('cart.index', compact('cart', 'subtotal', 'total', 'shipping'));
    }
    
    

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart');
        foreach ($request->input('quantities') as $productId => $quantity) {
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] = $quantity;
            }
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Cart updated!');
    }

    public function removeFromCart($productId)
    {
        $cart = session()->get('cart');
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Product removed from cart!');
    }
}
