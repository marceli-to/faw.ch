<?php
namespace App\View\Components;
use Illuminate\View\Component;

class LinkLess extends Component
{
  /**
   * Text
   *
   * @var String
   */
  public $text;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($text = NULL)
  {
    $this->text = $text;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-less');
  }
}
