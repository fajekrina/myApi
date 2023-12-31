<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\MachineBrandController;
use App\Http\Controllers\MachineTypeController;
use App\Http\Controllers\MachineMutationController;
use App\Http\Controllers\MDepartmentController;
use App\Http\Controllers\MUnitController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

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

Route::get('403', function () {
    return view('pages.403');
});

Route::middleware(['guest'])->get('login',[AuthenticationController::class, 'index'])->name('login');
Route::post('login/authenticate',[AuthenticationController::class, 'authenticate'])->name('login.auth');

Route::get('register', [AuthenticationController::class, 'createRegister'])->name('register.create');
Route::post('register', [AuthenticationController::class, 'storeRegister'])->name('register.store');

Route::middleware(['auth'])->group(function() {
    Route::get('/', [AuthenticationController::class, 'home'])->name('home');
    Route::get('logout', [AuthenticationController::class, 'Logout'])->name('logout');
    
    Route::get('token', [TokenController::class, 'index'])->name('token.index');
    Route::get('token-generate', [TokenController::class, 'store'])->name('token.store');
    Route::get('token-regenerate', [TokenController::class, 'update'])->name('token.update');

    Route::middleware(['role:super_admin'])->group(function() {
        Route::resource('article', ArticleController::class);
        Route::resource('unit', MUnitController::class);
        // Route::resource('token', TokenController::class);
    });
    Route::resource('department', MDepartmentController::class);

    Route::resource('mobil', MobilController::class);
    Route::get('peminjaman/find/{awal}/{akhir}', [PeminjamanController::class, 'find'])->name('peminjaman.find');
    Route::resource('peminjaman', PeminjamanController::class);
    Route::resource('pengembalian', PengembalianController::class);

    Route::resource('machine', MachineController::class);
    Route::resource('machine_brand', MachineBrandController::class);
    Route::resource('machine_type', MachineTypeController::class);
    Route::resource('machine_mutation', MachineMutationController::class);
});

