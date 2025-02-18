<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CashAwardController;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user',[UserController::class,'index']);

Route::post('/store/first/step',[CashAwardController::class,'storeFirstStep'])->name('store.first.step');
Route::post('/store/second/step',[CashAwardController::class,'storeSecondStep'])->name('store.second.step');

Route::post('/user/all/record',[CashAwardController::class,'userAllRecord'])->name('user.all.record');
Route::post('/store/third/step',[CashAwardController::class,'storeThirdStep'])->name('store.third.step');

// api/user/all/record

