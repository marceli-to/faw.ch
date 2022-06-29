<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Forum;
use App\Models\ForumArticle;
use App\Http\Requests\ForumArticleStoreRequest;
use Illuminate\Http\Request;

class ForumArticleController extends Controller
{
  /**
   * Get a list of articles
   * 
   * @param Forum $forum
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(Forum $forum, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(ForumArticle::published()->where('forum_id', $forum->id)->get());
    }
    return new DataCollection(ForumArticle::where('forum_id', $forum->id)->get());
  }

  /**
   * Get a single article
   * 
   * @param ForumArticle $article
   * @return \Illuminate\Http\Response
   */
  public function find(ForumArticle $article)
  {
    $article = ForumArticle::find($article->id);
    return response()->json($article);
  }

  /**
   * Store a newly created article
   *
   * @param  \Illuminate\Http\ForumArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ForumArticleStoreRequest $request)
  {
    $article = ForumArticle::create($request->all());
    $article->save();
    return response()->json(['articleId' => $article->id]);
  }

  /**
   * Update a article for a given article
   *
   * @param ForumArticle $article
   * @param  \Illuminate\Http\ForumArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(ForumArticle $article, ForumArticleStoreRequest $request)
  {
    $article = ForumArticle::findOrFail($article->id);
    $article->update($request->all());
    $article->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given article
   *
   * @param  ForumArticle $article
   * @return \Illuminate\Http\Response
   */
  public function toggle(ForumArticle $article)
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
      $i = ForumArticle::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a article
   *
   * @param  ForumArticle $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(ForumArticle $article)
  {
    $article->delete();
    return response()->json('successfully deleted');
  }
}
