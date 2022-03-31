<?php
namespace App\View\Components;
use Illuminate\View\Component;

class ToggleText extends Component
{
  /**
   * Title
   *
   * @var String
   */

  public $title;

  /**
   * Css classes
   *
   * @var String
   */

  public $cssClass;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($title = NULL, $cssClass = NULL)
  {
    $this->title = $title;
    $this->cssClass = $cssClass;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.toggle-text');
  }
}
