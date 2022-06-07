<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Controller;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Home-Route
Route::get('/', [DataController::class, 'home'])->name('home');

// add-activities
Route::post('/store', [DataController::class, 'store'])->name('store');
// update-activities
Route::put('/update{data}', [DataController::class, 'update'])->name('update');

// button-routing
Route::get('/edit{data}', [DataController::class, 'edit'])->name('edit');
Route::get('/confirm{data}', [DataController::class, 'confirm'])->name('confirm');
Route::post('/delete{data}', [DataController::class, 'cut'])->name('cut');
