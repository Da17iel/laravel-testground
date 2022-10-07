<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\URLRoutingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// HOMEPAGE
Route::get('/', [HomepageController::class, 'welcome']);

// SINGLE USER
Route::get('/users/{user:username}', [UserController::class, 'ShowSingle']);

// ALL USERS
Route::get('/all-users', [UserController::class, 'ShowAll']);

// EDIT PROFILE
Route::get('/edit-profile', [\App\Http\Controllers\EditProfileController::class, 'OpenProfileEdit']);

// OPEN THE EDIT MENU
Route::get('/edit-menu', [\App\Http\Controllers\EditProfileController::class, 'OpenEditMenu']);

// OPEN THE EDIT MENU
Route::post('/save-edit', [\App\Http\Controllers\EditProfileController::class, 'SaveEditMenu']);


// PASSWORD RESET LINK FORM
Route::get('/forgot-password', [\App\Http\Controllers\PasswordResetController::class, 'ForgotPasswordForm']
)->middleware('guest')->name('password.request');

// PASSWORD RESET SHOULD GET SAVED
Route::post('/forgot-password', [\App\Http\Controllers\PasswordResetController::class, 'ForgotPasswordSubmission'])
->middleware('guest')->name('password.email');

// ACTUAL PASSWORD RESET FORM
Route::get('/reset-password/{token}', [\App\Http\Controllers\PasswordResetController::class, "ForgotPasswordToken"])
    ->middleware('guest')->name('password.reset');


// Saving the new Password
Route::post('reset-password', [\App\Http\Controllers\PasswordResetController::class, 'ProcessingForgotPasswordForm']);



// ALL POSTS
Route::get('/posts', [PostController::class, 'ShowAll']);

// SINGLE POSTS
Route::get('/post/{post:slug}', [PostController::class, 'ShowSingle']);

// CREATE POST
Route::get('/create-post', [PostController::class, 'ShowCreatePost']);
Route::post('/create', [PostController::class, 'StoreCreatedPost'])->name('create');

// STORE A COMMENT
Route::post('/store-comment', [CommentsController::class, 'storeComment']);

// STORE A REPLY TO A COMMENT
Route::post('/store-reply', [CommentsController::class, 'storeReply']);


Route::get('/api/posts', [PostController::class, 'getPosts']);

// SMALL LITTLE MINI PROJECTS
Route::redirect('/hi', '/facebook');

Route::get('/facebook', [ArtController::class, 'face']);

Route::get('/laravel', [ArtController::class, 'laravel']);

// VIEW GENERATOR
Route::get('/views/{name}-{age}', [URLRoutingController::class, 'UrlRouting'])->whereAlpha('name')->whereNumber('age');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
