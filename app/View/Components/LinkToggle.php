<?php
namespace App\View\Components;
use Illuminate\View\Component;

class LinkToggle extends Component
{
  /**
   * Text
   *
   * @var String
   */
  public $text;

  /**
   * Css class
   *
   * @var String
   */
  public $cssClass;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($text = NULL, $cssClass = NULL)
  {
    $this->text = $text;
    $this->cssClass = $cssClass;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-toggle');
  }
}
