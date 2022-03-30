<?php
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DebateController;

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
Route::get('/veranstaltungen/kalender', [EventController::class, 'calendar'])->name('page.event.calendar');
Route::get('/veranstaltungen/jahresprogramm', [EventController::class, 'activities'])->name('page.event.activities');
Route::get('/veranstaltungen/unser-bahnhof-winterthur', [EventController::class, 'station'])->name('page.event.station');
Route::get('/veranstaltungen/stadtwerkstatt', [EventController::class, 'workshop'])->name('page.event.workshop');
Route::get('/veranstaltungen/archiv', [EventController::class, 'archive'])->name('page.event.archive');
Route::get('/debatten', [DebateController::class, 'index'])->name('page.debate');


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


