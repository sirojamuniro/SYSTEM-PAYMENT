<?php

use App\Http\Controllers\Payment\PaymentController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'prefix' => 'payments'], function ($router) {
    Route::get('/', [PaymentController::class, 'index']);
    Route::post('create', [PaymentController::class, 'create']);
    Route::put('update/{id}', [PaymentController::class, 'update']);
    Route::delete('delete/{id}', [PaymentController::class, 'delete']);
});
