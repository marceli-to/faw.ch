<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Teaser;
use App\Http\Requests\TeaserStoreRequest;
use Illuminate\Http\Request;

class TeaserController extends Controller
{
  /**
   * Get a list of teasers
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Teaser::get());
  }

  /**
   * Get a single teaser
   * 
   * @param Teaser $teaser
   * @return \Illuminate\Http\Response
   */
  public function find(Teaser $teaser)
  {
    $teaser = Teaser::with('images')->find($teaser->id);
    return response()->json($teaser);
  }

  /**
   * Store a newly created teaser
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(TeaserStoreRequest $request)
  {
    $teaser = Teaser::create($request->all());
    $teaser->save();
    return response()->json(['teaserId' => $teaser->id]);
  }

  /**
   * Update a teaser for a given teaser
   *
   * @param Teaser $teaser
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Teaser $teaser, TeaserStoreRequest $request)
  {
    $teaser = Teaser::findOrFail($teaser->id);
    $teaser->update($request->all());
    $teaser->save();
    return response()->json('successfully updated');
  }


  /**
   * Toggle the status a given teaser
   *
   * @param  Teaser $teaser
   * @return \Illuminate\Http\Response
   */
  public function toggle(Teaser $teaser)
  {
    $teaser->publish = $teaser->publish == 0 ? 1 : 0;
    $teaser->save();
    return response()->json($teaser->publish);
  }

  /**
   * Remove a teaser
   *
   * @param  Teaser $teaser
   * @return \Illuminate\Http\Response
   */
  public function destroy(Teaser $teaser)
  {
    $teaser->delete();
    return response()->json('successfully deleted');
  }
}
