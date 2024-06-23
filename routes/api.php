<?php
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('cust',[CustController::class,'index']);
Route::post('new-cust',[CustController::class,'store']);
Route::get('get-custdata/{id}',[CustController::class,'show']);
Route::put('update-custdata/{id}',[CustController::class,'update']);
Route::delete('delete-custdata/{id}',[CustController::class,'destroy']);

