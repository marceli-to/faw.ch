<?php
namespace App\View\Components;
use Illuminate\View\Component;

class TruncatedText extends Component
{
 /**
   * preview
   *
   * @var String
   */
  public $preview;


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($preview = NULL)
  {
    $this->preview = $preview;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.truncated-text');
  }
}
