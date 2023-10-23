<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
Route::get('/', [DashboardController::class, 'view'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/lesson/{id}', [DashboardController::class, 'lesson'])->middleware(['auth'])->name('lesson');


require __DIR__.'/auth.php';
