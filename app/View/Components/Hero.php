<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\HeroImage;

class Hero extends Component
{
  /**
   * HeroImage
   *
   * @var Object
   */
  public $hero;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($hero)
  {
    $this->hero = $hero;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.hero');
  }
}
