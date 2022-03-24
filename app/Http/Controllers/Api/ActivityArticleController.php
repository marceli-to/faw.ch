<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Activity;
use App\Models\ActivityArticle;
use App\Models\File;
use App\Models\Link;
use App\Http\Requests\ActivityArticleStoreRequest;
use Illuminate\Http\Request;

class ActivityArticleController extends Controller
{
  /**
   * Get a list of articles
   * 
   * @param Activity $activity
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(Activity $activity, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(ActivityArticle::published()->where('activity_id', $activity->id)->get());
    }
    return new DataCollection(ActivityArticle::where('activity_id', $activity->id)->get());
  }

  /**
   * Get a single article
   * 
   * @param ActivityArticle $article
   * @return \Illuminate\Http\Response
   */
  public function find(ActivityArticle $article)
  {
    $article = ActivityArticle::with('files', 'links')->find($article->id);
    return response()->json($article);
  }

  /**
   * Store a newly created article
   *
   * @param  \Illuminate\Http\ActivityArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ActivityArticleStoreRequest $request)
  {
    $article = ActivityArticle::create($request->all());
    $article->save();
    $this->handleFiles($article, $request->input('files'));
    $this->handleLinks($article, $request->input('links'));
    return response()->json(['articleId' => $article->id]);
  }

  /**
   * Update a article for a given article
   *
   * @param ActivityArticle $article
   * @param  \Illuminate\Http\ActivityArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(ActivityArticle $article, ActivityArticleStoreRequest $request)
  {
    $article = ActivityArticle::findOrFail($article->id);
    $article->update($request->all());
    $article->save();
    $this->handleFiles($article, $request->input('files'));
    $this->handleLinks($article, $request->input('links'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given article
   *
   * @param  ActivityArticle $article
   * @return \Illuminate\Http\Response
   */
  public function toggle(ActivityArticle $article)
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
      $i = ActivityArticle::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a article
   *
   * @param  ActivityArticle $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(ActivityArticle $article)
  {
    $article->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated files
   *
   * @param ActivityArticle $article
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(ActivityArticle $article, $files = NULL)
  {
    if ($files)
    {
      foreach($files as $file)
      {
        $img = File::findOrFail($file['id']);
        $img->fileable_id = $article->id;
        $img->fileable_type = ActivityArticle::class;
        $img->save();
      }
    }
  }

  /**
   * Handle associated links
   *
   * @param ActivityArticle $article
   * @param Array $links
   * @return void
   */  

  protected function handleLinks(ActivityArticle $article, $links = NULL)
  {
    if ($links)
    {
      foreach($links as $link)
      {
        $l = Link::findOrFail($link['id']);
        $l->linkable_id = $article->id;
        $l->linkable_type = ActivityArticle::class;
        $l->save();
      }
    }
  }
}
