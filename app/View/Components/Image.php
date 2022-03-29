<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Image extends Component
{

  /**
   * Image
   *
   * @var Object
   */
  public $image;

  /**
   * Max width
   *
   * @var String
   */
  public $maxWidth;

  /**
   * Max height
   *
   * @var String
   */
  public $maxHeight;

  /**
   * Ratio
   *
   * @var String
   */
  public $ratio;

  /**
   * Wrapper class
   *
   * @var String
   */
  public $wrapperClass;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image = NULL, $maxWidth = 0, $maxHeight = 0, $ratio = NULL, $wrapperClass = NULL)
  {
    $this->image = $image;
    $this->maxWidth = $maxWidth;
    $this->maxHeight = $maxHeight;
    $this->ratio = $ratio;
    $this->wrapperClass = $wrapperClass;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.image');
  }
}
