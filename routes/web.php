<?php

use Illuminate\Support\Facades\Route;
use App\ZendeskApi;

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

Route::get('/tickets', [App\Http\Controllers\TicketsController::class, 'tickets']);
Route::get('/details/{ticket_id}', [App\Http\Controllers\TicketsController::class, 'details']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
