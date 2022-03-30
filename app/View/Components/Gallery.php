<?php
namespace App\View\Components;
use Illuminate\View\Component;

class Gallery extends Component
{
  /**
   * Images
   *
   * @var Array
   */

  public $images;

  /**
   * Limit
   *
   * @var Boolean
   */

  public $limit;


  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($images = [], $limit = FALSE)
  {
    $this->images = $images;
    $this->limit = $limit;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.gallery');
  }
}
