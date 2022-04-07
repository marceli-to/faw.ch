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
   * Ratio
   *
   * @var Boolean
   */
  public $ratio;

  /**
   * Wrapper class
   *
   * @var String
   */
  public $wrapperClass;

  /**
   * Show caption
   *
   * @var Boolean
   */
  public $showCaption;

  /**
   * Maximum sizes for responsive images
   *
   * @var Array
   */
  public $maxSizes;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($image = NULL, $ratio = NULL, $wrapperClass = NULL, $showCaption = FALSE, $maxSizes = [])
  {
    $this->image = $image;
    $this->maxSizes = $maxSizes;
    $this->ratio = $ratio;
    $this->wrapperClass = $wrapperClass;
    $this->showCaption = $showCaption;
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
