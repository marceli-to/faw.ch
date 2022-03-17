<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\TeaserController;
use App\Http\Controllers\Api\HeroImageController;
use App\Http\Controllers\Api\ImageController;

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

  // Images
  Route::get('images', [ImageController::class, 'get']);
  Route::post('images/order', [ImageController::class, 'order']);
  Route::get('image/{image}', [ImageController::class, 'find']);
  Route::post('image/upload', [ImageController::class, 'upload']);
  Route::post('image', [ImageController::class, 'store']);
  Route::put('image/coords/{image}', [ImageController::class, 'coords']);
  Route::put('image/{image}', [ImageController::class, 'update']);
  Route::get('image/state/{image}', [ImageController::class, 'toggle']);
  Route::delete('image/{image}', [ImageController::class, 'destroy']);

  // Hero images
  Route::get('hero/images/{heroImage:slug}', [HeroImageController::class, 'get']);

  // Teaser
  Route::get('teasers', [TeaserController::class, 'get']);
  Route::get('teaser/{teaser}', [TeaserController::class, 'find']);
  Route::post('teaser', [TeaserController::class, 'store']);
  Route::put('teaser/{teaser}', [TeaserController::class, 'update']);
  Route::get('teaser/state/{teaser}', [TeaserController::class, 'toggle']);
  Route::post('teasers/order', [TeaserController::class, 'order']);
  Route::delete('teaser/{teaser}', [TeaserController::class, 'destroy']);
  
  // Uploads
  // Route::post('image/upload', [UploadController::class, 'store']);

});



