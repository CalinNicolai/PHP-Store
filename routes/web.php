<?php

/**
 * This file contains all the routes for the web application.
 */

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChocolatesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

/**
 * Home page route.
 */
Route::get('/', [HomeController::class, 'index'])->name('home.index');

/**
 * About page route.
 */
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

/**
 * Chocolates page route.
 */
Route::get('/chocolates', [ChocolatesController::class, 'index'])->name('chocolates.index');

/**
 * Dashboard route for authenticated users.
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Routes for authenticated users.
 */
Route::middleware('auth')->group(function () {
    /**
     * Edit profile page route.
     */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    /**
     * Update profile route.
     */
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    /**
     * Delete profile route.
     */
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Cart page route.
     */
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    /**
     * Add product to cart route.
     */
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

    /**
     * Delete product from cart route.
     */
    Route::delete('/cart/{productId}', [CartController::class, 'delete'])->name('cart.delete');
});

/**
 * Routes for authenticated users with admin privileges.
 */
Route::middleware(['auth', Admin::class])->group(function () {
    /**
     * Admin dashboard route.
     */
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    /**
     * Resource routes for managing products.
     */
    Route::resource('/adminproducts', ProductController::class);

    /**
     * Resource routes for managing users.
     */
    Route::resource('/adminusers', UserController::class);
});

/**
 * Authentication routes.
 */
require __DIR__ . '/auth.php';
