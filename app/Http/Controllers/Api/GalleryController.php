<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Video;
use App\Http\Requests\GalleryStoreRequest;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
  /**
   * Get a list of pages
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Gallery::published()->orderBy('order')->orderBy('title')->get());
    }
    return new DataCollection(Gallery::orderBy('order')->orderBy('title')->get());
  }

  /**
   * Get a single page
   * 
   * @param Gallery $gallery
   * @return \Illuminate\Http\Response
   */
  public function find(Gallery $gallery)
  {
    $gallery = Gallery::with('images', 'videos')->find($gallery->id);
    return response()->json($gallery);
  }

  /**
   * Store a newly created page
   *
   * @param  \Illuminate\Http\GalleryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(GalleryStoreRequest $request)
  {
    $gallery = Gallery::create([
      'slug' => $request->input('title') ? \AppHelper::slug($request->input('title')) : \AppHelper::slug($request->input('link_text')),
      'title' => $request->input('title'),
      'subtitle' => $request->input('subtitle'),
      'text' => $request->input('text'),
      'credits' => $request->input('credits'),
      'link_text' => $request->input('link_text'),
      'publish' => $request->input('publish'),
    ]);
    $gallery->save();
    $this->handleImages($gallery, $request->input('images'));
    $this->handleVideos($gallery, $request->input('videos'));
    return response()->json(['pageId' => $gallery->id]);
  }

  /**
   * Update a page for a given page
   *
   * @param Gallery $gallery
   * @param  \Illuminate\Http\GalleryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Gallery $gallery, GalleryStoreRequest $request)
  {
    $gallery = Gallery::findOrFail($gallery->id);
    $gallery->update($request->except(['slug']));
    $gallery->slug = $request->input('title') ? \AppHelper::slug($request->input('title')) : \AppHelper::slug($request->input('link_text'));
    $gallery->save();
    $this->handleImages($gallery, $request->input('images'));
    $this->handleVideos($gallery, $request->input('videos'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given page
   *
   * @param  Gallery $gallery
   * @return \Illuminate\Http\Response
   */
  public function toggle(Gallery $gallery)
  {
    $gallery->publish = $gallery->publish == 0 ? 1 : 0;
    $gallery->save();
    return response()->json($gallery->publish);
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
      $i = Gallery::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a page
   *
   * @param  Gallery $gallery
   * @return \Illuminate\Http\Response
   */
  public function destroy(Gallery $gallery)
  {
    $gallery = Gallery::with('images')->find($gallery->id);
    $gallery->images()->delete();
    $gallery->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Gallery $gallery
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Gallery $gallery, $images = NULL)
  {
    if ($images)
    {
      foreach($images as $image)
      {
        $img = Image::findOrFail($image['id']);
        $img->imageable_id = $gallery->id;
        $img->imageable_type = Gallery::class;
        $img->save();
      }
    }
  }

  /**
   * Handle associated videos
   *
   * @param Gallery $gallery
   * @param Array $videos
   * @return void
   */  

  protected function handleVideos(Gallery $gallery, $videos = NULL)
  {
    if ($videos)
    {
      foreach($videos as $video)
      {
        $vid = Video::findOrFail($video['id']);
        $vid->videoable_id = $gallery->id;
        $vid->videoable_type = Gallery::class;
        $vid->save();
      }
    }
  }
}
