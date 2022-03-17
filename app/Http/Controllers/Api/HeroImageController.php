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

}
