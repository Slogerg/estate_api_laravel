<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ImageController;
use App\Models\Building;
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

Route::get('building', [BuildingController::class,'index']);
Route::get('building/{id}', [BuildingController::class,'show']);
Route::post('building', [BuildingController::class,'store']);
Route::put('building/{id}', [BuildingController::class,'update']);
Route::delete('building/{id}', [BuildingController::class,'delete']);

Route::get('categories', [CategoryController::class,'index']);

Route::post('/upload', [ImageController::class, 'store'])->name('upload');
Route::get('/media/{building}', [ImageController::class, 'getImages'])->name('building.images');

Route::get('category/{id}', [CategoryController::class,'getCategoryByBuilding']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
