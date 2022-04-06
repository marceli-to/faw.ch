<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DebateController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Auth routes
Auth::routes(['verify' => true, 'register' => false]);
Route::get('/logout', 'Auth\LoginController@logout');

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('page.index');
Route::get('/winterthur-im-bild', [PageController::class, 'wib'])->name('page.wib');
Route::get('/veranstaltungen/kalender', [EventController::class, 'calendar'])->name('page.event.calendar');
Route::get('/veranstaltungen/jahresprogramm', [EventController::class, 'activities'])->name('page.event.activities');
Route::get('/veranstaltungen/unser-bahnhof-winterthur', [EventController::class, 'station'])->name('page.event.station');
Route::get('/veranstaltungen/stadtwerkstatt', [EventController::class, 'workshop'])->name('page.event.workshop');
Route::get('/veranstaltungen/archiv', [EventController::class, 'archive'])->name('page.event.archive');
Route::get('/debatten', [DebateController::class, 'index'])->name('page.debate');
Route::get('/ueber-uns', [AboutController::class, 'index'])->name('page.about');
Route::get('/mitgliedschaft', [MemberController::class, 'index'])->name('page.member');
Route::post('/mitglied-werden', [MemberController::class, 'register']);
Route::get('/kontakt', [ContactController::class, 'index'])->name('page.contact');

Route::get('/{page:slug}/{gallery}/{gallery_slug?}', [GalleryController::class, 'show'])->name('page.gallery');

// Url based images
Route::get('/img/{template}/{filename}/{maxW?}/{maxH?}/{coords?}/{ratio?}', [ImageController::class, 'getResponse']);

/*
|--------------------------------------------------------------------------
| Admin routes
|--------------------------------------------------------------------------
|
*/

Route::middleware('auth:sanctum', 'verified')->group(function() {
  
  // Catch all routes
  Route::get('administration/{any?}', function () {
    return view('layout.authenticated');
  })->where('any', '.*')->middleware('role:admin')->name('authenticated');


});


