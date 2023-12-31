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
Route::get('/dashboard/abscence', [DashboardController::class, 'abscence'])->middleware(['auth'])->name('abscence');
Route::post('/dashboard/filter', [DashboardController::class, 'filter'])->middleware(['auth'])->name('dashboard.filter'); 
Route::post('/dashboard/use/filter', [DashboardController::class, 'userFilter'])->middleware(['auth'])->name('dashboard.user.filter'); 
Route::post('/dashboard/{id}', [DashboardController::class, 'submit'])->middleware(['auth'])->name('dashboard.submit');
Route::get('/dashboard/abscence/delete/{id}', [DashboardController::class, 'deleteAbscent'])->middleware(['auth'])->name('delete.Abscent');
Route::get('/dashboard/students', [DashboardController::class, 'students'])->middleware(['auth'])->name('students');
Route::get('/dashboard/students/delete/{id}', [DashboardController::class, 'deleteUser'])->middleware(['auth'])->name('delete.User');
Route::post('/dashboard/students/add', [DashboardController::class, 'addUser'])->middleware(['auth'])->name('add.user');




require __DIR__.'/auth.php';
