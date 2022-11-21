<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
});


// Authenticated routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    // Auth routes
    Route::controller(AuthController::class)->group(function () {
        Route::get('auth/user', 'user');
        Route::post('auth/logout', 'logout');
    });

      // Customer routes
      Route::controller(CustomerController::class)->group(function () {
        Route::get('customers/paginate/{params?}', 'paginate')->name('Customer: View Customer');
        Route::get('customers/all', 'all')->name('Customer: View Customer');
        Route::get('customers/{customer}', 'get')->name('Customer: View Customer');
        Route::post('customers', 'store')->name('Customer: Create Customer');
        Route::patch('customers/{customer}', 'update')->name('Customer: Edit/Update Customer');
        Route::delete('customers/{customer}', 'delete')->name('Customer: Delete Customer');
    });

});
