<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group([
    'middleware' => 'api'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/checklist', [ChecklistController::class, 'index']);
    Route::post('/checklist', [ChecklistController::class, 'store']);
    Route::delete('/checklist/{checklist}', [ChecklistController::class, 'destroy']);




    Route::get('/checklist/{checklist}/item', [ChecklistController::class, 'show']);
    Route::post('/checklist/{checklist}/item', [ItemController::class, 'store']);
    Route::update('/checklist/{checklist}/item/{id}', [ItemController::class, 'update']);
    Route::delete('/checklist/{checklist}/item/{id}', [ItemController::class, 'destroy']);
    Route::update('/checklist/{checklist}/item/rename/{id}', [ItemController::class, 'rename']);
});
