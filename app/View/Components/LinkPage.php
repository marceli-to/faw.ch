<?php
namespace App\View\Components;
use Illuminate\View\Component;

class LinkPage extends Component
{

  /**
   * URL
   *
   * @var String
   */
  public $url;

  /**
   * Target
   *
   * @var String
   */
  public $target;

  /**
   * Text
   *
   * @var String
   */
  public $text;

  /**
   * Title
   *
   * @var String
   */
  public $title;

  /**
   * Css class
   *
   * @var String
   */
  public $cssClass;

  /**
   * Hash
   *
   * @var String
   */
  public $hash;
  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct($url = NULL, $target = '_self', $text = NULL, $title = NULL, $cssClass = NULL, $hash = NULL)
  {
    $this->url = $url;
    $this->target = $target;
    $this->text = $text;
    $this->title = $title;
    $this->cssClass = $cssClass;
    $this->hash = $hash;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-page');
  }
}
