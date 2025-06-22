<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Admin\AdminController as AdminDashboard;
use App\Http\Controllers\Admin\CategoryController as AdminCategory;
use App\Http\Controllers\Admin\ProductController as AdminProduct;
use App\Http\Controllers\Admin\OrderController as AdminOrder;
use App\Http\Controllers\Admin\FeedbackController as AdminFeedback;
use App\Http\Controllers\Admin\UserController as AdminUser;
use Illuminate\Support\Facades\Auth;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/season-products', [ProductController::class, 'season'])->name('season.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [OrderController::class, 'checkout'])->name('orders.checkout');
Route::post('/checkout', [OrderController::class, 'place'])->name('orders.place');
Route::get('/order/{order}', [OrderController::class, 'confirmation'])->name('orders.confirmation');

Route::post('/feedback/{product}', [FeedbackController::class, 'store'])->name('feedback.store');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('login', function () {
        return view('admin.login');
    })->name('admin.login');
    Route::post('login', function () {
        $credentials = request(['email', 'password']);
        if (Auth::attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
    })->name('admin.login.post');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboard::class, 'dashboard'])->name('admin.dashboard');
        Route::resource('categories', AdminCategory::class, ['as' => 'admin']);
        Route::resource('products', AdminProduct::class, ['as' => 'admin']);
        Route::resource('orders', AdminOrder::class, ['only' => ['index','update'], 'as' => 'admin']);
        Route::get('feedback', [AdminFeedback::class, 'index'])->name('admin.feedback.index');

        Route::resource('users', AdminUser::class, ['except' => ['show'], 'as' => 'admin']);
        // Route::middleware('is_admin')->group(function () {
        // });

        Route::post('logout', function () {
            Auth::logout();
            return redirect()->route('admin.login');
        })->name('admin.logout');
    });
});
