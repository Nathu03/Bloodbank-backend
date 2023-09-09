<?php

use App\Http\Controllers\BloodDonors;
use App\Http\Controllers\BloodDonorsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScheduleEventController;
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



// Register and login routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login']);
// Events
Route::get('/events', [ScheduleEventController::class, 'index']);
Route::post('/schedule-events', [ScheduleEventController::class, 'store']);

//blood-donors
Route::get('/blood-doners', [BloodDonorsController::class, 'index']);
Route::post('/blooddoners', [BloodDonorsController::class, 'store']);
