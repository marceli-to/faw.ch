<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\AnnualProgram;
use App\Models\AnnualProgramArticle;
use App\Http\Requests\AnnualProgramArticleStoreRequest;
use Illuminate\Http\Request;

class AnnualProgramArticleController extends Controller
{
  /**
   * Get a list of articles
   * 
   * @param AnnualProgram $program
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(AnnualProgram $program, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(AnnualProgramArticle::published()->where('annual_program_id', $program->id)->get());
    }
    return new DataCollection(AnnualProgramArticle::where('annual_program_id', $program->id)->get());
  }

  /**
   * Get a single article
   * 
   * @param AnnualProgramArticle $article
   * @return \Illuminate\Http\Response
   */
  public function find(AnnualProgramArticle $article)
  {
    $article = AnnualProgramArticle::find($article->id);
    return response()->json($article);
  }

  /**
   * Store a newly created article
   *
   * @param  \Illuminate\Http\AnnualProgramArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(AnnualProgramArticleStoreRequest $request)
  {
    $article = AnnualProgramArticle::create($request->all());
    $article->save();
    return response()->json(['articleId' => $article->id]);
  }

  /**
   * Update a article for a given article
   *
   * @param AnnualProgramArticle $article
   * @param  \Illuminate\Http\AnnualProgramArticleStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(AnnualProgramArticle $article, AnnualProgramArticleStoreRequest $request)
  {
    $article = AnnualProgramArticle::findOrFail($article->id);
    $article->update($request->all());
    $article->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given article
   *
   * @param  AnnualProgramArticle $article
   * @return \Illuminate\Http\Response
   */
  public function toggle(AnnualProgramArticle $article)
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
      $i = AnnualProgramArticle::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a article
   *
   * @param  AnnualProgramArticle $article
   * @return \Illuminate\Http\Response
   */
  public function destroy(AnnualProgramArticle $article)
  {
    $article->delete();
    return response()->json('successfully deleted');
  }
}
