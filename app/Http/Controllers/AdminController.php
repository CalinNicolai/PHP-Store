<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class AdminController
 *
 * Controller for admin-related functionality.
 */
class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     *
     * @return View
     */
    public function index()
    {
        // Return the admin dashboard view
        return view('admin.dashboard');
    }
}
