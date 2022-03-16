<?php
namespace App\Http\Controllers\Api;
use App\Models\Asset;
use App\Models\AssetType;
use App\Services\Media;
use App\Http\Resources\DataCollection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AssetController extends Controller
{
  /**
   * Get a list of assets
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Asset::orderBy('created_at')->get());
  }

  /**
   * Get a single asset for a given asset
   * 
   * @param Asset $asset
   * @return \Illuminate\Http\Response
   */
  public function find(Asset $asset)
  {
    $asset = Asset::findOrFail($asset->id);
    return response()->json($asset);
  }

  /**
   * Store a newly added asset
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $data = $request->all();

    // Generate UUID
    $data['uuid'] = \Str::uuid();

    // Get types and add type_id
    $type = AssetType::where('key', $request->input('type'))->get()->first();
    $data['type_id'] = $type->id;

    // Create asset
    $asset = Asset::create($data);
    $asset->save();
    return response()->json(['assetId' => $asset->id]);
  }

  /**
   * Update a asset for a given asset
   *
   * @param Asset $asset
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function update(Asset $asset, ImageStoreRequest $request)
  {
    $asset = Asset::findOrFail($asset->id);
    $asset->update($request->all());
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given asset
   *
   * @param  Asset $asset
   * @return \Illuminate\Http\Response
   */
  public function toggle(Asset $asset)
  {
    $asset->publish = $asset->publish == 0 ? 1 : 0;
    $asset->save();
    return response()->json($asset->publish);
  }

  /**
   * Update the cropping coords of the specified asset
   *
   * @param Asset $asset
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function coords(Asset $asset, Request $request)
  {
    $asset = Asset::findOrFail($asset->id);
    $asset->coords_w = round($request->input('coords_w'), 12);
    $asset->coords_h = round($request->input('coords_h'), 12);
    $asset->coords_x = round($request->input('coords_x'), 12);
    $asset->coords_y = round($request->input('coords_y'), 12);

    if ($asset->coords_w > $asset->coords_h)
    {
      $asset->orientation = 'l';
    }
    else
    {
      $asset->orientation = 'p';
    } 

    $asset->save();
    $this->removeCachedImage($asset);
    return response()->json('successfully updated');
  }

  /**
   * Remove the specified asset from storage
   *
   * @param  string $asset
   * @return \Illuminate\Http\Response
   */
  
  public function destroy($asset)
  {
    // Delete from database
    $record = Asset::where('name', '=', $asset)->first();
    
    if ($record)
    {
      $record->delete();
    }

    // Delete from storage
    $directories = Storage::allDirectories('public');
    foreach($directories as $d)
    {
      Storage::delete($d . '/'. $asset);
    }
    
    return response()->json('successfully deleted');
  }

  /**
   * Upload an asset
   * 
   * @param  Request $request
   * @return \Illuminate\Http\Response
   */

  public function upload(Request $request)
  { 
    $media = (new Media(['force_lowercase' => false]))->store($request);
    return response()->json($media);
  }

  /**
   * Delete an asset
   * 
   * @param  String $asset
   * @return \Illuminate\Http\Response
   */

  public function delete($asset)
  { 
    $media = (new Media())->remove($asset, TRUE);
    return response()->json($media);
  }

  /**
   * Remove cached version of the asset
   *
   * @param Asset $asset
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  private function removeCachedImage(Asset $asset)
  {
    // Get an instance of the ImageCache class
    $cache = new \Intervention\Image\ImageCache();

    // Get a cached asset from it and apply all of your templates / methods
    $asset = $cache->make(storage_path('app/public/uploads/') . $asset->name)->filter(new \App\Filters\Image\Template\Cache);

    // Remove the asset from the cache by using its internal checksum
    Cache::forget($asset->checksum());
  }
}
