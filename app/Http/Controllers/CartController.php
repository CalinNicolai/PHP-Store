<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * CartController is responsible for handling cart related actions.
 */
class CartController extends Controller
{
    /**
     * Display the cart items for the authenticated user.
     *
     * @return View
     */
    public function index()
    {
        // Get the products in the user's cart
        $cartItems = Auth::user()->products()->get();

        // Return the cart view with the cart items
        return view('cart.index', compact('cartItems'));
    }

    /**
     * Add a product to the user's cart.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function add(Request $request)
    {
        $user = Auth::user();
        $product = Product::find($request->product_id);

        if (!$product) {
            // Redirect back with an error message if the product is not found
            return redirect()->route('cart.index')->with('error', 'Product not found');
        }

        // Check if the product is already in the user's cart
        $existingProduct = $user->products()->where('product_id', $product->id)->first();

        if ($existingProduct) {
            // Increase the quantity of the existing product in the cart by 1
            $existingProduct->pivot->update(['quantity' => $existingProduct->pivot->quantity + 1]);
        } else {
            // Add the new product to the user's cart with a quantity of 1
            $user->products()->attach($product->id, ['quantity' => 1]);
        }

        // Redirect back with a success message
        return redirect()->route('chocolates.index')->with('success', 'Product added to cart');
    }

    /**
     * Remove a product from the user's cart.
     *
     * @param int $productId
     * @return RedirectResponse
     */
    public function delete($productId)
    {
        // Get authenticated user
        $user = Auth::user();

        // Remove the product from the user's cart
        $user->products()->detach($productId);

        // Redirect back with a success message
        return redirect()->route('cart.index')->with('success', 'Product removed from cart');
    }
}
