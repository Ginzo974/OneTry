<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\VoitureController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\VoituresController;
use App\Http\Controllers\Frontend\ReservationsController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('indexUser');
Route::get('/allvoitures', [VoituresController::class, 'index'])->name('voiture.index');
Route::get('/res', [ReservationsController::class, 'page_res'])->name('res.page_res');

// Route::post('/res', [ReservationsController::class, 'storepage_res'])->name('res.store.pageres');
Route::post('/resaction', [ReservationsController::class, 'pageResa'])->name('pageResa');

Route::get('/resaupdate/{id_resa}', [ReservationController::class, 'update'])->name('updateResa');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'App\Http\Middleware\Admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/voitures', VoitureController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__ . '/auth.php';
