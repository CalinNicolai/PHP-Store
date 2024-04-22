<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * ChocolatesController class
 *
 * This controller handles the logic for the chocolates page.
 */
class ChocolatesController extends Controller
{
    /**
     * Display a listing of the chocolates.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request)
    {
        // Query the products table
        $products = Product::query();

        // Check if a search parameter was passed
        if ($request->has('search')) {
            // Get the search query
            $search = $request->input('search');
            // Filter the products by name
            $products->where('name', 'like', "%$search%");
        }

        // Get the filtered products
        $products = $products->get();

        // Render the chocolates view with the products
        return view('chocolates', ['chocolates' => $products]);
    }
}
