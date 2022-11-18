<?php

use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Livewire\AvailabilityLog;
use App\Http\Livewire\DashboardIndex;
use App\Http\Livewire\DatalogIndex;
use App\Http\Livewire\PerformanceLog;
use App\Http\Livewire\QualityLog;

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

Route::get('/', [LoginController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', DashboardIndex::class)->middleware('auth')->name('home');
Route::get('/dashboard/datalog', DatalogIndex::class)->middleware('auth');
Route::get('/datalog-performance', PerformanceLog::class)->middleware('auth')->name('performance');
Route::get('/datalog-availability', AvailabilityLog::class)->middleware('auth')->name('availability');
Route::get('/datalog-quality', QualityLog::class)->middleware('auth')->name('quality');
// Route::get('/dashboard/admin', DashboardIndex::class)->middleware('auth');

Route::resource('/dashboard/admin', AdminUserController::class)->except('show')->middleware('admin');