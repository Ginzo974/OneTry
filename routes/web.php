<?php


use App\Http\Controllers\Frontend\Voit;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VoitureController;
use App\Http\Controllers\Frontend\ResController;
use App\Http\Controllers\Frontend\VoitController;
use App\Http\Controllers\Admin\ReservationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/allvoitures', VoitController::class, 'index')->name('allvoitures');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::ressource('/voitures', VoitureController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
