<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Article;
use App\Models\ArticleGallery;
use App\Models\Image;
use App\Services\Media;
use App\Http\Requests\ArticleStoreRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
  /**
   * Get a list of articles
   * 
   * @param Page $page
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(Page $page, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Article::published()->where('page_id', $page->id)->get());
    }
    return new DataCollection(Article::where('page_id', $page->id)->get());
  }

  /**
   * Get a single article
   * 
   * @param Article $article
   * @return \Illuminate\Http\Response
   */
  public function find(Article $article)
  {
    $article = Article::with('images', 'galleries')->find($article->id);
    return response()->json($article);
  }

  /**
   * Store a newly created article
   *
   * @param  \Illuminate\Http\ArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ArticleStoreRequest $request)
  {
    $article = Article::create($request->all());
    $article->save();
    $this->handleImages($article, $request->input('images'));
    $this->handleGalleries($article, $request->input('galleries'));
    return response()->json(['articleId' => $article->id]);
  }

  /**
   * Update a article for a given article
   *
   * @param Article $article
   * @param  \Illuminate\Http\ArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Article $article, ArticleStoreRequest $request)
  {
    $article = Article::findOrFail($article->id);
    $article->update($request->all());
    $article->save();
    $this->handleImages($article, $request->input('images'));
    $this->handleGalleries($article, $request->input('galleries'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given article
   *
   * @param  Article $article
   * @return \Illuminate\Http\Response
   */
  public function toggle(Article $article)
  {
    $article->publish = $article->publish == 0 ? 1 : 0;
    $article->save();
    return response()->json($article->publish);
  }

  /**
   * Update the order of the given grid item
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $items = $request->get('items');
    foreach($items as $item)
    {
      $i = Article::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a article
   *
   * @param  Article $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(Article $article)
  {
    $article = Article::with('images')->findOrFail($article->id);
    $article->images()->delete();
    $article->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Article $article
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Article $article, $images = NULL)
  {
    if ($images)
    {
      foreach($images as $image)
      {
        $img = Image::findOrFail($image['id']);
        $img->imageable_id = $article->id;
        $img->imageable_type = Article::class;
        $img->save();
      }
    }
  }

  /**
   * Handle associated galleries
   * 
   * @param Article $article
   * @param Array $galleries
   * @return void
   */

  protected function handleGalleries(Article $article, $galleries)
  {
    $article->galleries()->detach();
    foreach($galleries as $g)
    { 
      $record = new ArticleGallery([
        'article_id' => $article->id,
        'gallery_id' => $g['id'],
      ]);
      $record->save();
    }
  }
}
