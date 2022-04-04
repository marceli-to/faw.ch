<?php
namespace App\Http\Controllers\Api;
use App\Models\Video;
use App\Http\Resources\DataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\VideoStoreRequest;

class VideoController extends Controller
{
  /**
   * Get a list of videos
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Video::orderBy('created_at')->get());
  }

  /**
   * Get a single video for a given video
   * 
   * @param Video $video
   * @return \Illuminate\Http\Response
   */
  public function find(Video $video)
  {
    $video = Video::findOrFail($video->id);
    return response()->json($video);
  }

  /**
   * Store a newly added video
   *
   * @param  \Illuminate\Http\VideoStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(VideoStoreRequest $request)
  {
    $data = $request->all();

    // Generate UUID
    $data['uuid'] = \Str::uuid();

    // Add imagable id & type
    $data['videoable_id']   = $request->input('videoable_id') ? $request->input('videoable_id') : NULL;
    $data['videoable_type'] = $request->input('videoable_type') ? "App\Models\\" . $request->input('videoable_type') : NULL;

    // Create video
    $video = Video::create($data);
    $video->save();
    return response()->json(['videoId' => $video->id]);
  }

  /**
   * Update a video for a given video
   *
   * @param Video $video
   * @param  \Illuminate\Http\VideoStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Video $video, VideoStoreRequest $request)
  {
    $video = Video::findOrFail($video->id);
    $video->update($request->all());
    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given videos
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $videos = $request->get('videos');

    foreach($videos as $video)
    {
      $i = Video::find($video['id']);
      $i->order = $video['order'];
      $i->save(); 
    }
    
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given video
   *
   * @param  Video $video
   * @return \Illuminate\Http\Response
   */
  public function toggle(Video $video)
  {
    $video->publish = $video->publish == 0 ? 1 : 0;
    $video->save();
    return response()->json($video->publish);
  }

  /**
   * Remove the specified video from storage
   *
   * @param  string $video
   * @return \Illuminate\Http\Response
   */
  
  public function destroy(Video $video)
  {
    $video->delete();
    return response()->json('successfully deleted');
  }

}
