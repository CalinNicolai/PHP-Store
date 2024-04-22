<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class AboutController
 *
 * Controller for handling about page requests.
 */
class AboutController extends Controller
{
    /**
     * Display the about page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // Return the about view
        return view('about');
    }
}
