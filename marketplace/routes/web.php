<?php

// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\AuthController;
// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\ProductController;
// use App\Http\Controllers\CartController;
// // use App\Http\Controllers\ProductController;

// Route::get('/', function () {
//     return view('home');
// });




// // Homepage (products list)
// Route::get('/', [ProductController::class, 'index'])->name('products.index');

// // Auth routes
// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);

// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);

// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// // logout must be POST
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Route::post('/admin/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');


// // Vendor: Add Product page
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');

// // Vendor: My Products
// Route::get('/vendor/products', [ProductController::class, 'vendorProducts'])->name('vendor.products');

// Route::get('/cart', [CartController::class, 'index'])->name('cart.view');
// // Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');


// Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
// Route::get('/cart', [CartController::class, 'view'])->name('cart.view');


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Homepage
Route::get('/', [ProductController::class, 'index'])->name('products.index');

// Auth routes
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Admin role update
Route::post('/admin/update-role', [AdminController::class, 'updateRole'])->name('admin.updateRole');

// Vendor routes
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/vendor/products', [ProductController::class, 'vendorProducts'])->name('vendor.products');

// Cart routes
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'view'])->name('cart.view');




// use App\Http\Controllers\ProductController;

// routes/web.php











// Route::get('/', [ProductController::class, 'index'])->name('products.index');





// Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
// Route::post('/register', [AuthController::class, 'register']);
// Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
// Route::post('/login', [AuthController::class, 'login']);
// Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
