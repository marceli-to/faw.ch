<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\HeroImage;
use App\Http\Requests\TeaserStoreRequest;
use Illuminate\Http\Request;

class HeroImageController extends Controller
{
  /**
   * Get a list of hero images
   * @param HeroImage $heroImage
   * @return \Illuminate\Http\Response
   */
  public function get(HeroImage $heroImage)
  {
    $data = HeroImage::with('images')->find($heroImage->id);
    return response()->json($data);
  }

  /**
   * Get a random heroImage
   * @param HeroImage $heroImage
   * @return \Illuminate\Http\Response
   */
  public function getOne(HeroImage $heroImage)
  {
    $data = HeroImage::with('images')->find($heroImage->id);
    if ($data->images && $data->images->count() > 0)
    {
      return response()->json($data->images[mt_rand(0, $data->images->count()-1)]);
    }
    return response()->json($data);
  }

}
