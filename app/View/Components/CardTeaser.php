<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Teaser;

class CardTeaser extends Component
{
  /**
   * Teaser
   *
   * @var Object
   */
  public $teaser;

  /**
   * Css class
   *
   * @var Boolean
   */
  public $cssClass;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(Teaser $teaser, $cssClass = 'md:span-6')
  {
    $this->teaser = $teaser;
    $this->cssClass = $cssClass;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.card-teaser');
  }
}