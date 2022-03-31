<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Teaser;
use App\Models\Image;
use App\Models\Link;
use App\Http\Requests\TeaserStoreRequest;
use Illuminate\Http\Request;

class TeaserController extends Controller
{
  /**
   * Get a list of teasers
   * 
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Teaser::with('image')->published()->orderBy('created_at')->get());
    }
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
    $teaser = Teaser::with('images', 'files', 'links')->find($teaser->id);
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
    $this->handleImages($teaser, $request->input('images'));
    $this->handleLinks($teaser, $request->input('links'));
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
    $this->handleImages($teaser, $request->input('images'));
    $this->handleLinks($teaser, $request->input('links'));
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
    $teaser = Teaser::with('images', 'files', 'links', 'gridItem')->find($teaser->id);
    $teaser->gridItem()->delete();    
    $teaser->images()->delete();
    $teaser->files()->delete();
    $teaser->links()->delete();
    $teaser->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Teaser $teaser
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Teaser $teaser, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $teaser->id;
      $img->imageable_type = Teaser::class;
      $img->save();
    }
  }

  /**
   * Handle associated links
   *
   * @param Teaser $teaser
   * @param Array $links
   * @return void
   */  

  protected function handleLinks(Teaser $teaser, $links = NULL)
  {
    if ($links)
    {
      foreach($links as $link)
      {
        $l = Link::findOrFail($link['id']);
        $l->linkable_id = $teaser->id;
        $l->linkable_type = Teaser::class;
        $l->save();
      }
    }
  }
}
