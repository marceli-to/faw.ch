<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Heading extends Component
{
  /**
   * Type
   *
   * @var String
   */
  public $type;

  /**
   * Title
   *
   * @var String
   */
  public $title;

  /**
   * Subtitle
   *
   * @var String
   */
  public $subtitle;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($type = 'h2', $title = NULL, $subtitle = NULL)
  {
    $this->type = $type;
    $this->title = $title;
    $this->subtitle = $subtitle;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.heading');
  }
}
