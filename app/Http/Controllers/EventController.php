<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\AnnualProgram;
use App\Models\Page;
use App\Services\AnnualPrograms;
use Illuminate\Http\Request;

class EventController extends BaseController
{
  protected $viewPath = 'pages.event.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show page 'Veranstaltungen - Kalender'
   * 
   * @return \Illuminate\Http\Response
   */
  public function calendar()
  {
    $events = [
      'upcoming' => Event::with('image', 'files')->upcoming()->orderBy('date', 'ASC')->get(),
      'sticky' => Event::with('image', 'files')->sticky()->get(),
      'past' => Event::with('files')->past()->orderBy('date', 'DESC')->limit(6)->get(),
    ];

    $annual_program = AnnualProgram::published()
      ->with('publishedImages', 'publishedFiles', 'publishedArticles', 'publishedArticlesSpecial')
      ->orderBy('periode_end', 'DESC')
      ->get()
      ->first();

    return view($this->viewPath . 'calendar', ['events' => $events, 'annual_program' => $annual_program]);
  }

  /**
   * Show page 'Veranstaltungen - Jahresprogramm'
   * 
   * @return \Illuminate\Http\Response
   */

  public function activities()
  {
    return $this->calendar();
  }

  /**
   * Show page 'Veranstaltungen - Unser Bahnhof Winterthur'
   * 
   * @return \Illuminate\Http\Response
   */

  public function station()
  {
    $page = Page::with(
      'publishedImage',
      'publishedArticles.publishedImage',
      'publishedArticles.galleries'
    )
    ->where('slug', 'unser-bahnhof-winterthur')
    ->get()
    ->first();
    return view($this->viewPath . 'station', ['page' => $page]);
  }

  /**
   * Show page 'Veranstaltungen - Ausstellungen'
   * 
   * @return \Illuminate\Http\Response
   */

  public function exhibitions()
  {
    $page = Page::with(
      'publishedImage',
      'publishedArticles.publishedImage',
      'publishedArticles.galleries'
    )
    ->where('slug', 'ausstellungen')
    ->get()
    ->first();
    return view($this->viewPath . 'exhibitions', ['page' => $page]);
  }

  /**
   * Show page 'Veranstaltungen - Stadtwerkstätten'
   * 
   * @return \Illuminate\Http\Response
   */

  public function workshop()
  {
    return view($this->viewPath . 'workshop');
  }

 /**
   * Show page 'Veranstaltungen - Stadtwerkstatt'
   * 
   * @return \Illuminate\Http\Response
   */

  public function workshopDetail($slug = NULL)
  {
    return view($this->viewPath . 'partials.' . $slug, ['page' => 'stadtwerkstatt', 'slug' => $slug]);
  }


  /**
   * Show page 'Veranstaltungen - Archiv'
   * 
   * @return \Illuminate\Http\Response
   */

  public function archive()
  {
    // Get events & group by periode
    $events = Event::with('image', 'files')->past()->orderBy('date', 'DESC')->get();
    $eventsGrouped = $events->groupBy('periode');

    // Get annual program files & group by periode
    $programFiles = (new AnnualPrograms())->filesByPeriode();
    return view($this->viewPath . 'archive', ['events' => $eventsGrouped->all(), 'programFiles' => $programFiles]);
  }
}
