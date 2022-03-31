<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Activity;
use App\Models\File;
use App\Http\Requests\ActivityStoreRequest;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
  /**
   * Get a list of activities
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Activity::published()->get());
    }
    return new DataCollection(Activity::get());
  }

  /**
   * Get a single activity
   * 
   * @param Activity $activity
   * @return \Illuminate\Http\Response
   */
  public function find(Activity $activity)
  {
    $activity = Activity::with('articles.files', 'articles.links')->find($activity->id);
    return response()->json($activity);
  }

  /**
   * Store a newly created activity
   *
   * @param  \Illuminate\Http\ActivityStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ActivityStoreRequest $request)
  {
    $activity = Activity::create($request->all());
    $activity->save();
    return response()->json(['activityId' => $activity->id]);
  }

  /**
   * Update a activity for a given activity
   *
   * @param Activity $activity
   * @param  \Illuminate\Http\ActivityStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Activity $activity, ActivityStoreRequest $request)
  {
    $activity = Activity::findOrFail($activity->id);
    $activity->update($request->all());
    $activity->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given activity
   *
   * @param  Activity $activity
   * @return \Illuminate\Http\Response
   */
  public function toggle(Activity $activity)
  {
    $activity->publish = $activity->publish == 0 ? 1 : 0;
    $activity->save();
    return response()->json($activity->publish);
  }

  /**
   * Remove a activity
   *
   * @param  Activity $activity
   * @return \Illuminate\Http\Response
   */
  public function destroy(Activity $activity)
  {
    $activity = Activity::with('articles.files', 'articles.links')->find($activity->id);
    $activity->articles()->delete();
    $activity->delete();
    return response()->json('successfully deleted');
  }

}
