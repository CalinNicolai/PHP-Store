<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * HomeController class
 *
 * This controller handles the logic for the home page.
 */
class HomeController extends Controller
{
    /**
     * Display the home page.
     *
     * @return View
     */
    public function index()
    {
        return view('home');
    }
}
