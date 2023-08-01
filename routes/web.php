<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BaseUiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DatabarangmasukController;
use App\Http\Controllers\DatabarangkeluarController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('logout', [LoginController::class, 'logout']);
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('Adminlogin');
Route::get('/admin/register', [RegisterController::class, 'showRegisterForm'])->name('Adminregister');
Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
Route::get('/tampil', [App\Http\Controllers\HomeController::class, 'tampil'])->name('tampil');

Route::get('/admin/role', [RoleController::class, 'index'])->name('role');
Route::get('/admin/role/create', [RoleController::class, 'create'])->name('role.create');
Route::post('/admin/role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('/admin/role/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/admin/role/update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::delete('/admin/role/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

Route::get('/admin/user', [UserController::class, 'index'])->name('user');
Route::get('/admin/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/admin/user/update/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/admin/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy');

Route::get('/admin/supplier', [SupplierController::class, 'index'])->name('supplier');
Route::get('/admin/supplier/create', [SupplierController::class, 'create'])->name('supplier.create');
Route::post('/admin/supplier/store', [SupplierController::class, 'store'])->name('supplier.store');
Route::get('/admin/supplier/edit/{id}', [SupplierController::class, 'edit'])->name('supplier.edit');
Route::post('/admin/supplier/update/{id}', [SupplierController::class, 'update'])->name('supplier.update');
Route::delete('/admin/supplier/destroy/{id}', [SupplierController::class, 'destroy'])->name('supplier.destroy');

Route::get('/admin/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/admin/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::get('/admin/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
Route::post('/admin/menu/update/{id}', [MenuController::class, 'update'])->name('menu.update');
Route::delete('/admin/menu/destroy/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Route::get('/admin/transaksi', [DatabarangkeluarController::class, 'index'])->name('barangkeluar');
Route::get('/admin/barang', [BarangController::class, 'index'])->name('barang');
Route::get('/admin/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/admin/barang/store', [BarangController::class, 'store'])->name('barang.store');
Route::get('/admin/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::post('/admin/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/admin/barang/destroy/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');

Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/admin/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/admin/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/admin/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/admin/kategori/destroy/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/search', [DatabarangkeluarController::class, 'search'])->name('search');
Route::controller(DatabarangkeluarController::class)->group(function(){
    Route::get('/admin/transaksi_bk', 'index')->name('transaksi.bk');
    Route::post('/admin/transaksi_bk/store', 'store')->name('transaksi.store');
    Route::get('/admin/transaksi_bk/list/destroy/{id}', 'destroy')->name('list_bk.destroy');
    Route::post('/admin/transaksi_bk/list/updatelist', 'updatelist')->name('list_bk.update');
    Route::post('/addlistbarang_bk', 'insertlist')->name('insertlist_bk');
    Route::get('/autocomplete_bk', 'autocomplete')->name('autocomplete_bk');
});

Route::controller(DatabarangmasukController::class)->group(function(){
    Route::get('admin/transaksi_bm', 'index')->name('transaksi.bm');
    Route::post('/admin/transaksi_bm/store', 'store')->name('transaksibm.store');
    Route::get('/autocomplete_bm', 'autocomplete')->name('autocomplete_bm');
    Route::post('/addlistbarang_bm', 'insertlist')->name('insertlist_bm');
    Route::post('/admin/transaksi_bm/list/updatelist', 'updatelist')->name('list_bm.update');
    Route::get('/admin/transaksi_bm/list/destroy/{id}', 'destroy')->name('list_bm.destroy');
});



