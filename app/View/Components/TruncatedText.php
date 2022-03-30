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
   * mobile only
   *
   * @var Boolean
   */

  public $mobileOnly;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($preview = NULL, $mobileOnly = NULL)
  {
    $this->preview = $preview;
    $this->mobileOnly = $mobileOnly;
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
