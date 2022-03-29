<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Event;
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
      'sticky' => Event::with('image', 'files')->sticky()->get()
    ];
    return view($this->viewPath . 'calendar', ['events' => $events]);
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
}
