<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\AnnualProgram;
use App\Services\AnnualPrograms;
use Illuminate\Http\Request;

class EventController extends BaseController
{
  protected $viewPath = 'pages.event.';

  public function __construct()
  {
    parent::__construct();
  }

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

  public function activities()
  {
    return $this->calendar();
  }

  public function station()
  {
    
  }

  public function workshop()
  {
    
  }

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
