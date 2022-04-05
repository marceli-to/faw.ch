<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Page;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends BaseController
{
  protected $viewPath = 'pages.gallery.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show a gallery
   * 
   * @param Page $page
   * @param Gallery $gallery
   * @return \Illuminate\Http\Response
   */

  public function show(Page $page, Gallery $gallery, $gallerySlug = NULL)
  {
    $page = Page::findOrFail($page->id);
    $gallery = Gallery::with('publishedImages')->findOrFail($gallery->id);
    return view($this->viewPath . 'index', ['page' => $page, 'gallery' => $gallery]);
  }

}
