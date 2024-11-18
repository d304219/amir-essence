<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        View::composer('components.*', function ($view) {
            // For authenticated users, get the total quantity of products in the cart
            if (Auth::check()) {
                $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
            } else {
                // For guest users, get the total quantity of products in the session cart
                $cart = session()->get('cart', []);
                $cartCount = array_reduce($cart, function ($carry, $item) {
                    return $carry + $item['quantity']; // Sum the quantity of each item
                }, 0);
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
