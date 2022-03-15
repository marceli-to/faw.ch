<?php
namespace App\Http\Controllers\Api;
use App\Models\HomeTeaserImage;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeTeaserImageController extends Controller
{
  protected $homeTeaserImage;
  
  /**
   * Constructor
   * 
   * @param HomeTeaserImage $homeTeaserImage
   */

  public function __construct(HomeTeaserImage $homeTeaserImage)
  {
    $this->homeTeaserImage = $homeTeaserImage;
  }

  /**
   * Store a newly added news image
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Store product image
    $homeTeaserImage = HomeTeaserImage::create($request->all());
    $homeTeaserImage->save();
    return response()->json(['homeTeaserImageId' => $homeTeaserImage->id]);
  }

  /**
   * Toggle the status a given image
   *
   * @param  HomeTeaserImage $homeTeaserImage
   * @return \Illuminate\Http\Response
   */
  public function toggle(HomeTeaserImage $homeTeaserImage)
  {
    $homeTeaserImage->publish = $homeTeaserImage->publish == 0 ? 1 : 0;
    $homeTeaserImage->save();
    return response()->json($homeTeaserImage->publish);
  }

  /**
   * Update the cropping coords of the specified resource.
   *
   * @param HomeTeaserImage $homeTeaserImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function coords(HomeTeaserImage $homeTeaserImage, Request $request)
  {
    $image = $this->homeTeaserImage->findOrFail($homeTeaserImage->id);
    $image->coords_w = round($request->input('coords_w'), 12);
    $image->coords_h = round($request->input('coords_h'), 12);
    $image->coords_x = round($request->input('coords_x'), 12);
    $image->coords_y = round($request->input('coords_y'), 12);
    $image->save();
    $this->removeCachedImage($image);
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
    // Delete image from database
    $record = $this->homeTeaserImage->where('name', '=', $image)->first();
    
    if ($record)
    {
      $record->delete();
    }

    // Delete file from storage
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
   * @param HomeTeaserImage $homeTeaserImage
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  private function removeCachedImage(HomeTeaserImage $homeTeaserImage)
  {
    // Get an instance of the ImageCache class
    $imageCache = new \Intervention\Image\ImageCache();

    // Get a cached image from it and apply all of your templates / methods
    $image = $imageCache->make(storage_path('app/public/uploads/') . $homeTeaserImage->name)->filter(new \App\Filters\Image\Template\Cache);

    // Remove the image from the cache by using its internal checksum
    Cache::forget($image->checksum());
  }
}
