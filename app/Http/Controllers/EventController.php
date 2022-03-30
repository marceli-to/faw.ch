<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Event;
use App\Models\AnnualProgram;
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
      'past' => Event::with('files')->past()->orderBy('date', 'ASC')->get(),
    ];

    $annual_program = AnnualProgram::published()
      ->with('publishedImages', 'publishedFiles', 'publishedArticles', 'publishedArticlesSpecial')
      ->get()
      ->first();

    return view($this->viewPath . 'calendar', ['events' => $events, 'annual_program' => $annual_program]);
  }

  public function activities()
  {
    
  }

  public function station()
  {
    
  }

  public function workshop()
  {
    
  }

  public function archive()
  {
    return view($this->viewPath . 'archive');
  }
}
