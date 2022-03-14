<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\BookingParticipantController;
use App\Http\Controllers\Api\ParticipantController;
use App\Http\Controllers\Api\ParticipantSubscriptionController;
use App\Http\Controllers\Api\NewsletterController;
use App\Http\Controllers\Api\NewsletterArticleController;
use App\Http\Controllers\Api\NewsletterArticleImageController;
use App\Http\Controllers\Api\SubscriberController;

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
  Route::post('image/upload', [UploadController::class, 'image']);
  Route::post('file/upload', [UploadController::class, 'file']);

  // Events
  Route::get('events', [EventController::class, 'get']);
  Route::get('event/{event}', [EventController::class, 'find']);
  Route::post('event', [EventController::class, 'store']);
  Route::put('event/{event}', [EventController::class, 'update']);
  Route::get('event/state/{event}', [EventController::class, 'toggle']);
  Route::delete('event/{event}', [EventController::class, 'destroy']);
  
});



