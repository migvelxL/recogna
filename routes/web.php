<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MaquinasController;
use App\Http\Controllers\ReserveController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
    return view('home');
});

Route::get('/dashboard', function () {
    $maquinas = DB::table('maquinas')->get();
    return view('dashboard', ['maquinas' => $maquinas]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'index'])->name('users.index');

    Route::get('/create', [UserController::class, 'create'])->name('users.create');

    Route::post('/', [UserController::class, 'store'])->name('users.store');

    Route::get('/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

    Route::put('/{id}', [UserController::class, 'update'])->name('users.update');

    Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::prefix('maquinas')->middleware('auth')->group(function () {

    Route::get('/', [MaquinasController::class, 'index'])->name('maquinas.index');

    Route::post('/', [MaquinasController::class, 'store'])->name('maquinas.store');

    Route::get('/{id}', [MaquinasController::class, 'show'])->name('maquinas.show');

    Route::get('/{id}/edit', [MaquinasController::class, 'edit'])->name('maquinas.edit');

    Route::put('/{id}', [MaquinasController::class, 'update'])->name('maquinas.update');

    Route::delete('/{id}', [MaquinasController::class, 'destroy'])->name('maquinas.destroy');
});

Route::prefix('reserve')->middleware('auth')->group(function () {

    Route::get('/', [ReserveController::class, 'index'])->name('reserve.index');

    Route::post('/', [ReserveController::class, 'store'])->name('reserve.store');

    Route::get('/{id}', [ReserveController::class, 'show'])->name('reserve.show');

    Route::get('/{id}/edit', [ReserveController::class, 'edit'])->name('reserve.edit');

    Route::put('/{id}', [ReserveController::class, 'update'])->name('reserve.update');

    Route::delete('/{id}', [ReserveController::class, 'destroy'])->name('reserve.destroy');
});

Route::group(['middleware' => 'admin', 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::prefix('users')->group(function () {
            Route::get('/', [AdminController::class, 'users'])->name('admin.users');
            Route::get('/{id}/edit', [AdminController::class, 'usersEdit'])->name('admin.users.edit');
            Route::put('/{id}', [AdminController::class, 'usersUpdate'])->name('admin.users.update');
            Route::delete('/{id}', [AdminController::class, 'usersDestroy'])->name('admin.users.destroy');
        });
        Route::prefix('reserves')->group(function () {
            Route::get('/', [AdminController::class, 'reserves'])->name('admin.reserves');
            Route::get('/{id}/edit', [AdminController::class, 'reservesEdit'])->name('admin.reserves.edit');
            Route::put('/{id}', [AdminController::class, 'reservesUpdate'])->name('admin.reserves.update');
            Route::delete('/{id}', [AdminController::class, 'reservesDestroy'])->name('admin.reserves.destroy');
        });
        Route::prefix('maquinas')->group(function () {
            Route::get('/index', [AdminController::class, 'maquinas'])->name('admin.maquinas');
            Route::post('/', [AdminController::class, 'maquinasStore'])->name('admin.maquinas.store');
            Route::get('/create', [AdminController::class, 'maquinasCreate'])->name('admin.maquinas.create');
            Route::get('/{id}/edit', [AdminController::class, 'maquinasEdit'])->name('admin.maquinas.edit');
            Route::put('/{id}', [AdminController::class, 'maquinasUpdate'])->name('admin.maquinas.update');
            Route::delete('/{id}', [AdminController::class, 'maquinasDestroy'])->name('admin.maquinas.destroy');
        });
    });
});
