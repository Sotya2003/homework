<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AllTransactionController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\cancelController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DependentDropdownController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\riwayatTransaksiController;
use App\Http\Controllers\KelolaAkunController;
use App\Http\Controllers\MobileAPIController;
use App\Http\Controllers\RegisterConfirmationController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GoogleRegisterController;
use App\Http\Controllers\ForgotPasswordConfirmationController;
use App\Http\Controllers\laporanController;
use Illuminate\Support\Facades\Auth;

use Laravel\Socialite\Facades\Socialite;
use App\Models\users;
use Illuminate\Http\Request;

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

//ke halaman base
Route::get('/', function () {return redirect('/home');});

//ke controller logout
Route::get('logout/', [LogoutController::class,'logout']);

//ke halaman register
Route::resource('register/', RegisterController::class);

//ke halaman login
Route::resource('login/', LoginController::class);

//ke halaman layanan
Route::get('layanan/', [HomeController::class,'layanan']);

//ke halaman kontak
Route::get('kontak/', [HomeController::class,'kontak']);

//ke halaman tentang-kami
Route::get('tentang-kami/', [HomeController::class,'tentangkami']);

//ke halaman home
Route::resource('home/', HomeController::class);

//konfirmasi email
Route::resource('register/confirmation/', RegisterConfirmationController::class);

//konfirmasi lupa password
Route::resource('forgot/confirmation/', ForgotPasswordConfirmationController::class);

//Mobile API
Route::resource('mobile/', MobileAPIController::class);

//dashboard Kelola Akun
Route::resource('dashboard/kelola-akun/', KelolaAkunController::class);

//Lupa Password
Route::resource('forgot/', ForgotPasswordController::class);

//Edit Akun
Route::resource('edit/', EditController::class);

//Pesan
Route::resource('pesan/', PesanController::class);

//Dashboard
Route::resource('dashboard/', DashboardController::class);

//dashboard profil
Route::resource('dashboard/profil/', ProfilController::class);

//dashboard all transaksi
Route::resource('dashboard/semua-transaksi/', AllTransactionController::class);

//invoice
Route::resource('dashboard/invoice/', InvoiceController::class);

//pesanan
Route::resource('dashboard/pesanan/', PesananController::class);

//laporan
Route::resource('dashboard/laporan/', laporanController::class);

//riwayat transaksi
Route::resource('dashboard/riwayat-transaksi/', riwayatTransaksiController::class);

//hapus pesanan
Route::resource('dashboard/cancel/', cancelController::class);

//login dengan google
Route::get('auth/google/', [GoogleAuthController::class,'redirectToGoogle']);
Route::get('auth/google/callback/', [GoogleAuthController::class,'googleCallback']);
Route::resource('register/auth/google', GoogleRegisterController::class);

//coba wilayah
Route::get('dependent-dropdown', [DependentDropdownController::class,'index'])
    ->name('dependent-dropdown.index');
Route::post('dependent-dropdown', [DependentDropdownController::class,'store'])
    ->name('dependent-dropdown.store');


//verifikasi email user
//Auth::routes(['verify' => true]);

