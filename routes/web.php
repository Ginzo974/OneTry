<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VoitureController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\VoituresController as FrontendVoituresController;
use App\Http\Controllers\Frontend\ReservationsController as FrontendReservationsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/allvoitures', [FrontendVoituresController::class, 'index'])->name('voiture.index');
Route::get('/res', [FrontendReservationsController::class, 'page_res'])->name('res.page_res');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/voitures', VoitureController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
