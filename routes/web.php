<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminKategoriController;
use App\Http\Controllers\AdminProdukController;
use App\Http\Controllers\AdminTransaksiContrller;
use App\Http\Controllers\AdminTransaksiDetailController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AdminAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login/do', [AdminAuthController::class, 'doLogin'])->middleware('guest');
Route::get('logout', [AdminAuthController::class, 'logout'])->middleware('auth');

Route::get('/', function () {
    $data = [
        'content' => 'admin.dashboard.index'
    ];
    return view('admin.layouts.wrapper', $data);
})->middleware('auth');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', function(){
        $data = [
            'content' => 'admin.dashboard.index'
        ];
        return view('admin.layouts.wrapper', $data);

    });
    Route::resource('/admin/user', App\Http\Controllers\AdminUserController::class);
    Route::resource('/admin/transaksi', AdminTransaksiContrller::class);
    Route::get('/admin/transaksi/detail/cetak/{id}', [AdminTransaksiContrller::class, 'cetak'])->name('transaksi.cetak');
    Route::get('/transaksi/detail/selesai/{id}', [AdminTransaksiDetailController::class, 'done']);
    Route::get('/transaksi/detail/delete', [AdminTransaksiDetailController::class, 'delete']);
    Route::post('/transaksi/detail/create', [AdminTransaksiDetailController::class, 'create']);
    Route::resource('/transaksi', AdminTransaksiContrller::class);
    Route::resource('/produk', AdminProdukController::class);
    Route::resource('/kategori', AdminKategoriController::class);
    Route::resource('/user', AdminUserController::class);
});

