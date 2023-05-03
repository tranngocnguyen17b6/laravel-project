<?php

use App\Http\Controllers\DisasterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\SchoolController;

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

Route::match(['get', 'post'],'/login', function () {
    return view('login.index');
});
Route::post('/log-in', [LoginController::class, 'index']);


Route::resource('/format', FormatController::class);
Route::get('/format/coppy/{question_id}', [FormatController::class , 'coppy']);


Route::resource('/disaster', DisasterController::class);
Route::get('/disaster/coppy/{disater_id}', [DisasterController::class, 'coppy']);
//Route::get('/disaster', DisasterController::class);


Route::resource('/school', SchoolController::class);






