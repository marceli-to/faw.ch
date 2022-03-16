<?php
namespace App\Http\Controllers\Api;
use App\Models\HomeImage;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeImageController extends Controller
{
  /**
   * Get a list of images
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(HomeImage::orderBy('order')->get());
  }

  /**
   * Get a single image
   * 
   * @param HomeImage $image
   * @return \Illuminate\Http\Response
   */
  public function find(HomeImage $image)
  {
    $image = HomeImage::findOrFail($image->id);
    return response()->json($image);
  }

  /**
   * Store a newly added image
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Store product image
    $image = HomeImage::create($request->all());
    $image->save();
    return response()->json(['imageId' => $image->id]);
  }

  /**
   * Update a image for a given image
   *
   * @param HomeImage $image
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(HomeImage $image, ImageStoreRequest $request)
  {
    $image = HomeImage::findOrFail($image->id);
    $image->update($request->all());
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given image
   *
   * @param  HomeImage $image
   * @return \Illuminate\Http\Response
   */
  public function toggle(HomeImage $image)
  {
    $image->publish = $image->publish == 0 ? 1 : 0;
    $image->save();
    return response()->json($image->publish);
  }

  /**
   * Update the cropping coords of the specified resource.
   *
   * @param HomeImage $image
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function coords(HomeImage $image, Request $request)
  {
    $image = HomeImage::findOrFail($image->id);
    $image->coords_w = round($request->input('coords_w'), 12);
    $image->coords_h = round($request->input('coords_h'), 12);
    $image->coords_x = round($request->input('coords_x'), 12);
    $image->coords_y = round($request->input('coords_y'), 12);

    if ($image->coords_w > $image->coords_h)
    {
      $image->orientation = 'l';
    }
    else
    {
      $image->orientation = 'p';
    } 

    $image->save();
    $this->removeCachedImage($image);
    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given images
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $images = $request->get('images');
    foreach($images as $image)
    {
      $i = HomeImage::find($image['id']);
      $i->order = $image['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  string $image
   * @return \Illuminate\Http\Response
   */
  
  public function destroy($image)
  {
    // Delete from database
    $record = HomeImage::where('name', '=', $image)->first();
    
    if ($record)
    {
      $record->delete();
    }

    // Delete from storage
    $directories = Storage::allDirectories('public');
    foreach($directories as $d)
    {
      Storage::delete($d . '/'. $image);
    }
    
    return response()->json('successfully deleted');
  }

  /**
   * Remove cached version of the image
   *
   * @param HomeImage $image
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  private function removeCachedImage(HomeImage $image)
  {
    // Get an instance of the ImageCache class
    $imageCache = new \Intervention\Image\ImageCache();

    // Get a cached image from it and apply all of your templates / methods
    $image = $imageCache->make(storage_path('app/public/uploads/') . $image->name)->filter(new \App\Filters\Image\Template\Cache);

    // Remove the image from the cache by using its internal checksum
    Cache::forget($image->checksum());
  }
}
