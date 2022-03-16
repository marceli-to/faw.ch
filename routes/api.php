<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\HomeImageController;
use App\Http\Controllers\Api\HomeTeaserController;
use App\Http\Controllers\Api\HomeTeaserImageController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AssetController;

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

  // Assets
  Route::get('assets', [AssetController::class, 'get']);
  Route::get('asset/{asset}', [AssetController::class, 'find']);
  Route::post('asset/upload', [AssetController::class, 'upload']);
  Route::post('asset', [AssetController::class, 'store']);
  Route::put('asset/coords/{asset}', [AssetController::class, 'coords']);
  Route::put('asset/{asset}', [AssetController::class, 'update']);
  Route::get('asset/state/{asset}', [AssetController::class, 'toggle']);
  Route::delete('asset/{asset}', [AssetController::class, 'destroy']);

  // Uploads
  Route::post('image/upload', [UploadController::class, 'store']);

  // Home - Images
  Route::get('home/images', [HomeImageController::class, 'get']);
  Route::post('home/images/order', [HomeImageController::class, 'order']);
  Route::get('home/image/{image}', [HomeImageController::class, 'find']);
  Route::post('home/image', [HomeImageController::class, 'store']);
  Route::put('home/image/coords/{image}', [HomeImageController::class, 'coords']);
  Route::put('home/image/{image}', [HomeImageController::class, 'update']);
  Route::get('home/image/state/{image}', [HomeImageController::class, 'toggle']);
  Route::delete('home/image/{image}', [HomeImageController::class, 'destroy']);

  // Home - Teaser
  Route::get('home/teasers', [HomeTeaserController::class, 'get']);
  Route::get('home/teaser/{homeTeaser}', [HomeTeaserController::class, 'find']);
  Route::post('home/teaser', [HomeTeaserController::class, 'store']);
  Route::put('home/teaser/{homeTeaser}', [HomeTeaserController::class, 'update']);
  Route::get('home/teaser/state/{homeTeaser}', [HomeTeaserController::class, 'toggle']);
  Route::post('home/teasers/order', [HomeTeaserController::class, 'order']);
  Route::delete('home/teaser/{homeTeaser}', [HomeTeaserController::class, 'destroy']);

  // Home - Teaser images
  Route::get('home/teaser/image/state/{homeTeaserImage}', [HomeTeaserImageController::class, 'toggle']);
  Route::put('home/teaser/image/coords/{homeTeaserImage}', [HomeTeaserImageController::class, 'coords']);
  Route::post('home/teaser/image', [HomeTeaserImageController::class, 'store']);
  Route::post('home/teaser/image/order', [HomeTeaserImageController::class, 'order']);
  Route::get('home/teaser/image/state/{image}', [HomeTeaserImageController::class, 'toggle']);
  Route::delete('home/teaser/image/{homeTeaserImage}', [HomeTeaserImageController::class, 'destroy']);


  // // Events
  // Route::get('events', [EventController::class, 'get']);
  // Route::get('event/{event}', [EventController::class, 'find']);
  // Route::post('event', [EventController::class, 'store']);
  // Route::put('event/{event}', [EventController::class, 'update']);
  // Route::get('event/state/{event}', [EventController::class, 'toggle']);
  // Route::delete('event/{event}', [EventController::class, 'destroy']);
  
});



