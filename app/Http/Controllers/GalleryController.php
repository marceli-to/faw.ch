<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Page;
use App\Models\Article;
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
   * @param Article $article
   * @param Gallery $gallery
   * @return \Illuminate\Http\Response
   */

  public function show(Page $page, Article $article, Gallery $gallery, $gallerySlug = NULL)
  {
    $page = Page::with('publishedArticles.galleries')->findOrFail($page->id);
    $article = Article::with('galleries', 'page')->findOrFail($article->id);
    $gallery = Gallery::with('publishedImages', 'publishedVideos')->findOrFail($gallery->id);
    return view($this->viewPath . 'show', ['page' => $page, 'gallery' => $gallery, 'browse' => $this->getBrowse($page, $article, $gallery)]);
  }

  /**
   * Show a single gallery for static content
   * 
   * @param String $slug
   * @param Gallery $gallery
   * @return \Illuminate\Http\Response
   */

  public function single($slug = NULL, Gallery $gallery, $gallerySlug = NULL)
  {
    $gallery = Gallery::with('publishedImages', 'publishedVideos')->findOrFail($gallery->id);
    return view($this->viewPath . 'single', ['page' => $slug, 'gallery' => $gallery]);
  }

  protected function getBrowse(Page $page, Article $article, Gallery $gallery)
  {
    if ($article->galleries->count() <= 1)
    {
      return [];
    }

    $keys = [];
    foreach($article->galleries as $g)
    {
      $keys[] = (int) $g->id;
    }
    // Get current key
    $key = array_search($gallery->id, $keys);

    if ($key == 0)
    {
      $prevId = end($keys);
      $nextId = isset($keys[$key+1]) ? $keys[$key+1] : NULL;
    }
    else if ($key == count($keys) - 1)
    {
      $prevId = $keys[$key-1];
      $nextId = $keys[0];
    }
    else
    {
      $prevId = $keys[$key-1];
      $nextId = $keys[$key+1];
    }

    $items = [
      'prev' => [
        'page' => $page,
        'article' => $article,
        'gallery' => Gallery::find($prevId),
      ],
      'next' => [
        'page' => $page,
        'article' => $article,
        'gallery' => Gallery::find($nextId),
      ]
    ];
    
    return $items;
  }

}
