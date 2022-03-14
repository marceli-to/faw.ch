<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\HomeImageController;
use App\Http\Controllers\Api\EventController;


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

Route::middleware('auth:sanctum')->group(function() {
  Route::get('user', [UserController::class, 'find']);

  // Uploads
  Route::post('image/upload', [UploadController::class, 'store']);

  // Image
  Route::get('home/images', [HomeImageController::class, 'get']);
  Route::post('home/images/order', [HomeImageController::class, 'order']);
  Route::get('home/image/{image}', [HomeImageController::class, 'find']);
  Route::post('home/image', [HomeImageController::class, 'store']);
  Route::put('home/image/coords/{image}', [HomeImageController::class, 'coords']);
  Route::put('home/image/{image}', [HomeImageController::class, 'update']);
  Route::get('home/image/state/{image}', [HomeImageController::class, 'toggle']);
  Route::delete('home/image/{image}', [HomeImageController::class, 'destroy']);

  // Events
  Route::get('events', [EventController::class, 'get']);
  Route::get('event/{event}', [EventController::class, 'find']);
  Route::post('event', [EventController::class, 'store']);
  Route::put('event/{event}', [EventController::class, 'update']);
  Route::get('event/state/{event}', [EventController::class, 'toggle']);
  Route::delete('event/{event}', [EventController::class, 'destroy']);
  
});



