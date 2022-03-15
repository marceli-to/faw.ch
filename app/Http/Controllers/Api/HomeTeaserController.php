<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\HomeTeaser;
use App\Models\HomeTeaserImage;
use App\Http\Requests\HomeTeaserStoreRequest;
use Illuminate\Http\Request;

class HomeTeaserController extends Controller
{
  /**
   * Get a list of teasers
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(HomeTeaser::get());
  }

  /**
   * Get a single homeTeaser
   * 
   * @param HomeTeaser $homeTeaser
   * @return \Illuminate\Http\Response
   */
  public function find(HomeTeaser $homeTeaser)
  {
    $homeTeaser = HomeTeaser::with('images')->find($homeTeaser->id);
    return response()->json($homeTeaser);
  }

  /**
   * Store a newly created homeTeaser
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(HomeTeaserStoreRequest $request)
  {
    $homeTeaser = HomeTeaser::create($request->all());

    // Store images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = new HomeTeaserImage([
          'name'         => $i['name'],
          'coords_w'     => $i['coords_w'] ? round($i['coords_w'], 12) : NULL,
          'coords_h'     => $i['coords_h'] ? round($i['coords_h'], 12) : NULL,
          'coords_x'     => $i['coords_x'] ? round($i['coords_x'], 12) : NULL,
          'coords_y'     => $i['coords_y'] ? round($i['coords_y'], 12) : NULL,
          'publish'      => $i['publish'] ? $i['publish'] : 0,
          'orientation'  => $i['orientation'] ? $i['orientation'] : NULL,
          'home_teaser_id' => $homeTeaser->id,
        ]);
        $image->save();
      }
    }

    return response()->json(['homeTeaserId' => $homeTeaser->id]);
  }

  /**
   * Update a homeTeaser for a given homeTeaser
   *
   * @param HomeTeaser $homeTeaser
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(HomeTeaser $homeTeaser, HomeTeaserStoreRequest $request)
  {
    $homeTeaser = HomeTeaser::findOrFail($homeTeaser->id);
    $homeTeaser->update($request->all());
    $homeTeaser->save();

    // Update or add images
    if (!empty($request->images))
    {
      foreach($request->images as $i)
      {
        $image = HomeTeaserImage::updateOrCreate(
          ['id' => $i['id']], 
          [
            'name'         => $i['name'],
            'coords_w'     => $i['coords_w'] ? round($i['coords_w'], 12) : NULL,
            'coords_h'     => $i['coords_h'] ? round($i['coords_h'], 12) : NULL,
            'coords_x'     => $i['coords_x'] ? round($i['coords_x'], 12) : NULL,
            'coords_y'     => $i['coords_y'] ? round($i['coords_y'], 12) : NULL,
            'publish'      => $i['publish'] ? $i['publish'] : 0,
            'orientation'  => $i['orientation'] ? $i['orientation'] : NULL,
            'home_teaser_id' => $homeTeaser->id,
          ]
        );
      }
    }

    return response()->json('successfully updated');
  }


  /**
   * Toggle the status a given homeTeaser
   *
   * @param  HomeTeaser $homeTeaser
   * @return \Illuminate\Http\Response
   */
  public function toggle(HomeTeaser $homeTeaser)
  {
    $homeTeaser->publish = $homeTeaser->publish == 0 ? 1 : 0;
    $homeTeaser->save();
    return response()->json($homeTeaser->publish);
  }

  /**
   * Remove a homeTeaser
   *
   * @param  HomeTeaser $homeTeaser
   * @return \Illuminate\Http\Response
   */
  public function destroy(HomeTeaser $homeTeaser)
  {
    $homeTeaser->delete();
    return response()->json('successfully deleted');
  }
}
