<?php

use App\Http\Controllers\ShopRegistrationController;
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

Route::group(['prefix'=> 'shopPost'],function (){
    Route::post('/createPost',[\App\Http\Controllers\ShopPostController::class,'createPost']);
    Route::get('/show',[\App\Http\Controllers\ShopPostController::class,'showPost']);
    Route::get('/show/{id}',[\App\Http\Controllers\ShopPostController::class,'showPostById']);
    Route::get('/showShopItem/{shop_id}',[\App\Http\Controllers\ShopPostController::class,'showPostByShop_id']);
    Route::post('/updateShopPost/{id}',[\App\Http\Controllers\ShopPostController::class,'updateShopPost']);
    Route::delete('/deleteShopPost/{id}',[\App\Http\Controllers\ShopPostController::class,'deleteShopPost']);
});

Route::group(['prefix'=> 'shop'],function (){
    Route::post('/shopRegistration',[ShopRegistrationController::class, 'createUser']);
});




