<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\FormerBoardMemberType;
use Illuminate\Http\Request;

class FormerBoardMemberTypeController extends Controller
{
  /**
   * Get a list of former board member types
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(FormerBoardMemberType::get());
  }

  /**
   * Get a single former board member type
   * 
   * @param FormerBoardMemberType $formerBoardMemberType
   * @return \Illuminate\Http\Response
   */
  public function find(FormerBoardMemberType $formerBoardMemberType)
  {
    $formerBoardMemberType = FormerBoardMemberType::find($formerBoardMemberType->id);
    return response()->json($formerBoardMemberType);
  }
}
