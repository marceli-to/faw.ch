<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Gallery;
use App\Models\Image;
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
      return new DataCollection(Gallery::published()->get());
    }
    return new DataCollection(Gallery::get());
  }

  /**
   * Get a single page
   * 
   * @param Gallery $gallery
   * @return \Illuminate\Http\Response
   */
  public function find(Gallery $gallery)
  {
    $gallery = Gallery::with('images')->find($gallery->id);
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
    $gallery = Gallery::create($request->all());
    $gallery->save();
    $this->handleImages($gallery, $request->input('images'));
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
    $gallery->update($request->all());
    $gallery->save();
    $this->handleImages($gallery, $request->input('images'));
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
}
