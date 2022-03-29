<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Event;

class CardEvent extends Component
{
  /**
   * Event
   *
   * @var Object
   */
  public $event;

  /**
   * Preview?
   *
   * @var Boolean
   */
  public $preview;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(Event $event, $preview = FALSE)
  {
    $this->event = $event;
    $this->preview = $preview;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.card-event');
  }
}
