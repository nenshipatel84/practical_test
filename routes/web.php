<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/add_event",[EventController::class,'create']);
Route::get("/view_events",[EventController::class,'view_event']);
Route::post("/store_event",[EventController::class,'store']);
Route::any("/edit_event/{id}",[EventController::class,'edit_event']);
Route::any("/delete_event/{id}",[EventController::class,'delete_event']);
Route::any("/view_event_details/{id}",[EventController::class,'view_event_details']);



