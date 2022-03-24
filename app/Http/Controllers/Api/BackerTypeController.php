<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\BackerType;
use Illuminate\Http\Request;

class BackerTypeController extends Controller
{
  /**
   * Get a list of backer types
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(BackerType::orderBy('description', 'DESC')->get());
  }

  /**
   * Get a single backer type
   * 
   * @param BackerType $backerType
   * @return \Illuminate\Http\Response
   */
  public function find(BackerType $backerType)
  {
    $backerType = BackerType::find($backerType->id);
    return response()->json($backerType);
  }
}
