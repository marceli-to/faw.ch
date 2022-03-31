<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\History;
use App\Models\HistoryArticle;
use App\Http\Requests\HistoryArticleStoreRequest;
use Illuminate\Http\Request;

class HistoryArticleController extends Controller
{
  /**
   * Get a list of articles
   * 
   * @param History $history
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(History $history, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(HistoryArticle::published()->where('history_id', $history->id)->get());
    }
    return new DataCollection(HistoryArticle::where('history_id', $history->id)->get());
  }

  /**
   * Get a single article
   * 
   * @param HistoryArticle $article
   * @return \Illuminate\Http\Response
   */
  public function find(HistoryArticle $article)
  {
    $article = HistoryArticle::find($article->id);
    return response()->json($article);
  }

  /**
   * Store a newly created article
   *
   * @param  \Illuminate\Http\HistoryArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(HistoryArticleStoreRequest $request)
  {
    $article = HistoryArticle::create($request->all());
    $article->save();
    return response()->json(['articleId' => $article->id]);
  }

  /**
   * Update a article for a given article
   *
   * @param HistoryArticle $article
   * @param  \Illuminate\Http\HistoryArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(HistoryArticle $article, HistoryArticleStoreRequest $request)
  {
    $article = HistoryArticle::findOrFail($article->id);
    $article->update($request->all());
    $article->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given article
   *
   * @param  HistoryArticle $article
   * @return \Illuminate\Http\Response
   */
  public function toggle(HistoryArticle $article)
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
      $i = HistoryArticle::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a article
   *
   * @param  HistoryArticle $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(HistoryArticle $article)
  {
    $article->delete();
    return response()->json('successfully deleted');
  }
}
