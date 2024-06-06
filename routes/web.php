<?php

use App\Http\Controllers\TrafficLightsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/store-data',[TrafficLightsController::class,'store'])->name('storeData');
Route::get('/get-data',[TrafficLightsController::class,'get'])->name('getData');