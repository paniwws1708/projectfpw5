<?php 

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// UBAH BAGIAN INI (Mengalihkan / ke /login):
Route::get('/', function () {
    return redirect()->route('login');
});

// Rute Guest & Auth
Route::get('/login', [LoginController::class, 'create'])
    ->middleware('guest')
    ->name('login');

Route::post('/login', [LoginController::class, 'store'])
    ->middleware('guest')
    ->name('login.store');

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Rute khusus Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/reports/sales', [ReportController::class, 'sales'])->name('report.sales');
    
    // [Latihan 1] Rute /users khusus admin
    Route::get('/users', [UserController::class, 'index'])->name('users');
});

// Rute untuk Admin dan Kasir
Route::middleware(['auth', 'role:admin,kasir'])->group(function () {
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos', [PosController::class, 'store'])->name('pos.store');
});

Route::get('/dashboard', function () {
    return 'Have a nice day';
})->middleware('auth')->name('dashboard');

// Rute untuk halaman dashboard (hanya untuk pengguna yang sudah login)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/pos/history', function () {
    return 'Riwayat Transaksi';
})->middleware(['auth', 'role:kasir'])->name('pos.history');