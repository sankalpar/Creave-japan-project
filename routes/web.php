<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ItemController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

/*----------------------------  Admin Dashboard  -------------------------------*/

Route::get('/admin-login', function () {
    return view('admin.adminLogin');
});


Route::post('/admin/login', [AuthController::class, 'AdminLogin']);
Route::get('/admin/logout', [AuthController::class, 'adminlogout']);

Route::get('/admin/items', [ItemController::class, 'index']);
/*
|--------------------------------------------------------------------------
| ViewController
|--------------------------------------------------------------------------
*/

/*----------------------------  Dashboard  -------------------------------*/
Route::get('/'                                                                  , 'App\Http\Controllers\ViewController@dashboard')->name('dashboard');