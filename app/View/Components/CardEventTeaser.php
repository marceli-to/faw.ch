<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Event;

class CardEventTeaser extends Component
{
  /**
   * Event
   *
   * @var Object
   */
  public $event;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(Event $event)
  {
    $this->event = $event;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.card-event-teaser');
  }
}
