<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\Gallery;

class LinkGallery extends Component
{

  /**
   * Page slug
   * 
   * @var String
   */

  public $page;

  /**
   * Gallery Id
   *
   * @var Integer
   */
  public $id;

  /**
   * Gallery 
   *
   * @var Gallery
   */
  public $gallery;
  
  /**
   * Create a new component instance.
   *  
   * @param $page
   * @param $id
   * @return void
   */
  public function __construct($page = NULL, $id = NULL)
  {
    $this->gallery = Gallery::find($id);
    $this->page    = $page;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-gallery');
  }
}
