<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\MUnitController;
use App\Http\Controllers\Api\MDepartmentController;

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

Route::middleware(['auth:api'])->group(function() {
    Route::resource('article', ArticleController::class);
});

Route::post('unit/search', [MUnitController::class, 'search'])->name('unit.search');
Route::post('department/search', [MDepartmentController::class, 'search'])->name('department.search');
Route::resource('unit', MUnitController::class);
Route::resource('department', MDepartmentController::class);
