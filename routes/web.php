<?php 

use Illuminate\Support\Facades\Route;

// 1. ROUTING biasanya http method GET digunakan utnuk menampilkan sesuatu 
Route::get('/', function () {
    return 'Stevani';
});

Route::get('/stevani', function () {
    return 'Stevani Cantik';
});


// 2. ROUTE PARAMETER
Route::get('/user/{id}', function ($id) {
    return 'User ID: ' . $id;
});


// 3. NAMED ROUTE
Route::get('/profile', function () {
    return 'Ini Halaman Profile';
})->name('profile');

Route::get('/profil', function(){
    return 'ini Halaman ceritaku';

})->name('stevanu');


// 4. ROUTE GROUPS
Route::prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return 'Halaman Dashboard Admin';
    })->name('dashboard');

    Route::get('/users', function () {
        return 'Halaman Data User';
    })->name('users');

});

Route::post('/mahasiswa', function () {
    return 'Data mahasiswa berhasil ditambahkan';
});
