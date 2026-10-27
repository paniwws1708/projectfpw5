<?php 

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

// Redirect halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute Guest & Auth
Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest')->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');

// Rute Dashboard (Semua Pengguna Terautentikasi)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Rute Khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class)->except(['show']); // Mencegah error 403 pada /products/10
    Route::resource('purchases', PurchaseController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

// Rute untuk Admin dan Kasir
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

// Rute Khusus Kasir
Route::get('/pos/history', function () {
    return 'Riwayat Transaksi';
})->middleware(['auth', 'role:kasir'])->name('pos.history');