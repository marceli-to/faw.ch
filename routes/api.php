<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UploadController;
use App\Http\Controllers\Api\TeaserController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\HeroImageController;
use App\Http\Controllers\Api\GridItemController;
use App\Http\Controllers\Api\AnnualProgramController;
use App\Http\Controllers\Api\AnnualProgramArticleController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ActivityArticleController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\FileController;

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

  // Files
  Route::get('files', [FileController::class, 'get']);
  Route::post('files/order', [FileController::class, 'order']);
  Route::get('file/{file}', [FileController::class, 'find']);
  Route::post('file/upload', [FileController::class, 'upload']);
  Route::post('file', [FileController::class, 'store']);
  Route::put('file/{file}', [FileController::class, 'update']);
  Route::get('file/state/{file}', [FileController::class, 'toggle']);
  Route::delete('file/{file}', [FileController::class, 'destroy']);

  // Grid items
  Route::get('grid/items', [GridItemController::class, 'get']);
  Route::post('grid/item/store/event', [GridItemController::class, 'storeEvent']);
  Route::post('grid/item/store/teaser', [GridItemController::class, 'storeTeaser']);
  Route::delete('grid/item/{gridItem}', [GridItemController::class, 'destroy']);
  Route::post('grid/item/order', [GridItemController::class, 'order']);

  // Hero images
  Route::get('hero/images/{heroImage:slug}', [HeroImageController::class, 'get']);
  Route::get('hero/image/{heroImage:slug}', [HeroImageController::class, 'getOne']);
  
  // Teaser
  Route::get('teasers/{constraint?}', [TeaserController::class, 'get']);
  Route::get('teaser/{teaser}', [TeaserController::class, 'find']);
  Route::post('teaser', [TeaserController::class, 'store']);
  Route::put('teaser/{teaser}', [TeaserController::class, 'update']);
  Route::get('teaser/state/{teaser}', [TeaserController::class, 'toggle']);
  Route::post('teasers/order', [TeaserController::class, 'order']);
  Route::delete('teaser/{teaser}', [TeaserController::class, 'destroy']);
  
  // Event
  Route::get('events/{constraint?}', [EventController::class, 'get']);
  Route::get('event/{event}', [EventController::class, 'find']);
  Route::post('event', [EventController::class, 'store']);
  Route::put('event/{event}', [EventController::class, 'update']);
  Route::get('event/state/{event}', [EventController::class, 'toggle']);
  Route::delete('event/{event}', [EventController::class, 'destroy']);

  // Annual Program
  Route::get('annual-programs/{constraint?}', [AnnualProgramController::class, 'get']);
  Route::get('annual-program/{program}', [AnnualProgramController::class, 'find']);
  Route::post('annual-program', [AnnualProgramController::class, 'store']);
  Route::put('annual-program/{program}', [AnnualProgramController::class, 'update']);
  Route::get('annual-program/state/{program}', [AnnualProgramController::class, 'toggle']);
  Route::delete('annual-program/{program}', [AnnualProgramController::class, 'destroy']);

  // Annual Program Articles
  Route::get('annual-program-articles/{program}/{constraint?}', [AnnualProgramArticleController::class, 'get']);
  Route::get('annual-program-article/{article}', [AnnualProgramArticleController::class, 'find']);
  Route::post('annual-program-article', [AnnualProgramArticleController::class, 'store']);
  Route::put('annual-program-article/{article}', [AnnualProgramArticleController::class, 'update']);
  Route::get('annual-program-article/state/{article}', [AnnualProgramArticleController::class, 'toggle']);
  Route::post('annual-program-article/order', [AnnualProgramArticleController::class, 'order']);
  Route::delete('annual-program-article/{article}', [AnnualProgramArticleController::class, 'destroy']);

  // Activity
  Route::get('activities/{constraint?}', [ActivityController::class, 'get']);
  Route::get('activity/{activity}', [ActivityController::class, 'find']);
  Route::post('activity', [ActivityController::class, 'store']);
  Route::put('activity/{activity}', [ActivityController::class, 'update']);
  Route::get('activity/state/{activity}', [ActivityController::class, 'toggle']);
  Route::delete('activity/{activity}', [ActivityController::class, 'destroy']);

  // Activity Articles
  Route::get('activity-articles/{activity}/{constraint?}', [ActivityArticleController::class, 'get']);
  Route::get('activity-article/{article}', [ActivityArticleController::class, 'find']);
  Route::post('activity-article', [ActivityArticleController::class, 'store']);
  Route::put('activity-article/{article}', [ActivityArticleController::class, 'update']);
  Route::get('activity-article/state/{article}', [ActivityArticleController::class, 'toggle']);
  Route::post('activity-article/order', [ActivityArticleController::class, 'order']);
  Route::delete('activity-article/{article}', [ActivityArticleController::class, 'destroy']);

});



