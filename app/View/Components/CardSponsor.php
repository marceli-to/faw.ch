<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Teaser;

class CardSponsor extends Component
{
  /**
   * Logo
   *
   * @var String
   */
  public $logo;

  /**
   * Title / Alt
   *
   * @var String
   */
  public $title;


  /**
   * Uri
   *
   * @var String
   */
  public $uri;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($logo = NULL, $title = NULL, $uri = NULL)
  {
    $this->logo = $logo;
    $this->title = $title;
    $this->uri = $uri;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.card-sponsor');
  }
}
