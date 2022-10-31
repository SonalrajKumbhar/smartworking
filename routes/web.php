<?php

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


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


Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/property_form', [AdminController::class, 'getPropertyForm']);

Route::resource('property', AdminController::class);
Route::get('/getapidata', [AdminController::class, 'apiDataStore']);