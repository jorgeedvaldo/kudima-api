<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Api\ServiceController;

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

// Public Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Categories
    Route::get('/categories', [CategoryController::class, 'index']);

    // Services
    Route::get('/services', [ServiceController::class, 'index']);

    // Professionals
    Route::get('/professionals', [ProfessionalController::class, 'index']);
    Route::get('/professionals/{id}', [ProfessionalController::class, 'show']);

    // Service Requests
    Route::post('/requests', [ServiceRequestController::class, 'store']);
    Route::get('/requests', [ServiceRequestController::class, 'index']);
    Route::patch('/requests/{id}/status', [ServiceRequestController::class, 'updateStatus']);

    // Reviews
    Route::post('/reviews', [ReviewController::class, 'store']);
});
