<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Common Resource Routes:
// index - show all listing
// show - Show single listing
// create - show form to create single listing
// store - store new listing
// edit - show form to edit listing
// update - Update listing
// destroy - delete listing

// All Listings
Route::get('/', [ListingController::class, 'index']);

// Show Create Form
Route::get('/create', [ListingController::class, 'create'])->middleware('auth');

// Store Listing Data  
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');

// Delete listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth');

// Create Experience
Route::get('/listings/experience', [ListingController::class, 'experience'])->middleware('auth');

// Projects
Route::get('/listings/projects', [ListingController::class, 'projects'])->middleware('auth');

// About Page
Route::get('/listings/about', [ListingController::class, 'about'])->middleware('auth');









// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

// Log User Out
Route::post('/logout', [UserController::class, 'logout']);

// Show Log In Form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);








// Store Comment Data
Route::post('/listings/{id}/comment', [CommentController::class, 'store'])->middleware('auth');

// Show Edit Comment Form
Route::get('/edit-comment/{id}', [CommentController::class, 'edit'])->middleware('auth');

// Update Comment
Route::put('/comment/{id}', [CommentController::class, 'update'])->middleware('auth');

// Delete Comment
Route::delete('/listings/comment/{id}', [CommentController::class, 'destroy'])->middleware('auth');


// // Show Comment Form
// Route::get('/listings/{id}/comment', [CommentController::class, 'create'])->middleware('auth');



// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);