<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

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

Route::get('/application/create', [ApplicationController::class, 'create'])->name('application.create');
Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');
Route::patch('/application/{application}', [ApplicationController::class, 'update'])->name('application.update');
Route::get('/application/{application}/edit', [ApplicationController::class, 'edit'])->name('application.edit');
Route::get('/application/{application}', [ApplicationController::class, 'show'])->name('application.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
