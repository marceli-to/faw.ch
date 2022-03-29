<?php
namespace App\View\Components;
use Illuminate\View\Component;
use App\Models\File;

class LinkFile extends Component
{
  /**
   * File
   *
   * @var Object
   */
  public $file;

  /**
   * Create a new component instance.
   *
   * @return void
   */
  public function __construct(File $file)
  {
    $this->file = $file;
  }

  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\View\View|string
   */
  public function render()
  {
    return view('components.link-file');
  }
}
