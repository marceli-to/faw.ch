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
use App\Http\Controllers\Api\ForumController;
use App\Http\Controllers\Api\ForumArticleController;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\BoardMemberController;
use App\Http\Controllers\Api\BackerController;
use App\Http\Controllers\Api\BackerTypeController;
use App\Http\Controllers\Api\PartnerController;
use App\Http\Controllers\Api\PageController;
use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\FileController;
use App\Http\Controllers\Api\LinkController;
use App\Http\Controllers\Api\VideoController;

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

  // Links
  Route::get('links', [LinkController::class, 'get']);
  Route::post('link/order', [LinkController::class, 'order']);
  Route::get('link/{link}', [LinkController::class, 'find']);
  Route::post('link', [LinkController::class, 'store']);
  Route::put('link/{link}', [LinkController::class, 'update']);
  Route::get('link/state/{link}', [LinkController::class, 'toggle']);
  Route::delete('link/{link}', [LinkController::class, 'destroy']);

  // Videos
  Route::get('videos', [VideoController::class, 'get']);
  Route::post('video/order', [VideoController::class, 'order']);
  Route::get('video/{video}', [VideoController::class, 'find']);
  Route::post('video', [VideoController::class, 'store']);
  Route::put('video/{video}', [VideoController::class, 'update']);
  Route::get('video/state/{video}', [VideoController::class, 'toggle']);
  Route::delete('video/{video}', [VideoController::class, 'destroy']);

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
  Route::get('annual-program/copy/{program}', [AnnualProgramController::class, 'clone']);
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

  // Backer
  Route::get('backers/{constraint?}', [BackerController::class, 'get']);
  Route::get('backer/{backer}', [BackerController::class, 'find']);
  Route::post('backer', [BackerController::class, 'store']);
  Route::put('backer/{backer}', [BackerController::class, 'update']);
  Route::get('backer/state/{backer}', [BackerController::class, 'toggle']);
  Route::delete('backer/{backer}', [BackerController::class, 'destroy']);

  // Backer types
  Route::get('backer-types', [BackerTypeController::class, 'get']);

  // Partner
  Route::get('partners/{constraint?}', [PartnerController::class, 'get']);
  Route::get('partner/{partner}', [PartnerController::class, 'find']);
  Route::post('partner', [PartnerController::class, 'store']);
  Route::put('partner/{partner}', [PartnerController::class, 'update']);
  Route::get('partner/state/{partner}', [PartnerController::class, 'toggle']);
  Route::post('partner/order', [PartnerController::class, 'order']);
  Route::delete('partner/{partner}', [PartnerController::class, 'destroy']);

  // Forum
  Route::get('histories/{constraint?}', [ForumController::class, 'get']);
  Route::get('forum/{forum}', [ForumController::class, 'find']);
  Route::post('forum', [ForumController::class, 'store']);
  Route::put('forum/{forum}', [ForumController::class, 'update']);
  Route::get('forum/state/{forum}', [ForumController::class, 'toggle']);
  Route::delete('forum/{forum}', [ForumController::class, 'destroy']);

  // Forum Articles
  Route::get('forum-articles/{forum}/{constraint?}', [ForumArticleController::class, 'get']);
  Route::get('forum-article/{article}', [ForumArticleController::class, 'find']);
  Route::post('forum-article', [ForumArticleController::class, 'store']);
  Route::put('forum-article/{article}', [ForumArticleController::class, 'update']);
  Route::get('forum-article/state/{article}', [ForumArticleController::class, 'toggle']);
  Route::post('forum-article/order', [ForumArticleController::class, 'order']);
  Route::delete('forum-article/{article}', [ForumArticleController::class, 'destroy']);

  // Board
  Route::get('boards/{constraint?}', [BoardController::class, 'get']);
  Route::get('board/{board}', [BoardController::class, 'find']);
  Route::post('board', [BoardController::class, 'store']);
  Route::put('board/{board}', [BoardController::class, 'update']);
  Route::get('board/state/{board}', [BoardController::class, 'toggle']);
  Route::delete('board/{board}', [BoardController::class, 'destroy']);

  // Board Members
  Route::get('board-members/{board}/{constraint?}', [BoardMemberController::class, 'get']);
  Route::get('board-member/{member}', [BoardMemberController::class, 'find']);
  Route::post('board-member', [BoardMemberController::class, 'store']);
  Route::put('board-member/{member}', [BoardMemberController::class, 'update']);
  Route::get('board-member/state/{member}', [BoardMemberController::class, 'toggle']);
  Route::post('board-member/order', [BoardMemberController::class, 'order']);
  Route::delete('board-member/{member}', [BoardMemberController::class, 'destroy']);

  // Pages
  Route::get('pages/{constraint?}', [PageController::class, 'get']);
  Route::get('page/{page}', [PageController::class, 'find']);
  Route::post('page', [PageController::class, 'store']);
  Route::put('page/{page}', [PageController::class, 'update']);
  Route::get('page/state/{page}', [PageController::class, 'toggle']);
  Route::delete('page/{page}', [PageController::class, 'destroy']);

  // Page Articles
  Route::get('page-articles/{page}/{constraint?}', [ArticleController::class, 'get']);
  Route::get('page-article/{article}', [ArticleController::class, 'find']);
  Route::post('page-article', [ArticleController::class, 'store']);
  Route::put('page-article/{article}', [ArticleController::class, 'update']);
  Route::get('page-article/state/{article}', [ArticleController::class, 'toggle']);
  Route::post('page-article/order', [ArticleController::class, 'order']);
  Route::delete('page-article/{article}', [ArticleController::class, 'destroy']);

  // Galleries
  Route::get('galleries/{constraint?}', [GalleryController::class, 'get']);
  Route::get('gallery/{gallery}', [GalleryController::class, 'find']);
  Route::post('gallery', [GalleryController::class, 'store']);
  Route::put('gallery/{gallery}', [GalleryController::class, 'update']);
  Route::get('gallery/state/{gallery}', [GalleryController::class, 'toggle']);
  Route::post('gallery/order', [GalleryController::class, 'order']);
  Route::delete('gallery/{gallery}', [GalleryController::class, 'destroy']);

});



