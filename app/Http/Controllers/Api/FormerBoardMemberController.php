<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\FormerBoardMember;
use App\Http\Requests\FormerBoardMemberStoreRequest;
use Illuminate\Http\Request;

class FormerBoardMemberController extends Controller
{
  /**
   * Get a list of formerBoardMembers
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    $formerBoardMembers = FormerBoardMember::orderBy('order', 'ASC')->get();
    $formerBoardMembersGrouped = $formerBoardMembers->groupBy('type.id');
    return response()->json($formerBoardMembersGrouped->all());
  }

  /**
   * Get a single formerBoardMember
   * 
   * @param FormerBoardMember $formerBoardMember
   * @return \Illuminate\Http\Response
   */
  public function find(FormerBoardMember $formerBoardMember)
  {
    $formerBoardMember = FormerBoardMember::find($formerBoardMember->id);
    return response()->json($formerBoardMember);
  }

  /**
   * Store a newly created formerBoardMember
   *
   * @param  \Illuminate\Http\FormerBoardMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(FormerBoardMemberStoreRequest $request)
  {
    $formerBoardMember = FormerBoardMember::create($request->all());
    $formerBoardMember->save();
    return response()->json(['formerBoardMemberId' => $formerBoardMember->id]);
  }

  /**
   * Update a formerBoardMember for a given formerBoardMember
   *
   * @param FormerBoardMember $formerBoardMember
   * @param  \Illuminate\Http\FormerBoardMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(FormerBoardMember $formerBoardMember, FormerBoardMemberStoreRequest $request)
  {
    $formerBoardMember = FormerBoardMember::find($formerBoardMember->id);
    $formerBoardMember->update($request->all());
    $formerBoardMember->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given formerBoardMember
   *
   * @param  FormerBoardMember $formerBoardMember
   * @return \Illuminate\Http\Response
   */
  public function toggle(FormerBoardMember $formerBoardMember)
  {
    $formerBoardMember->publish = $formerBoardMember->publish == 0 ? 1 : 0;
    $formerBoardMember->save();
    return response()->json($formerBoardMember->publish);
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
      $i = FormerBoardMember::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a formerBoardMember
   *
   * @param  FormerBoardMember $formerBoardMember
   * @return \Illuminate\Http\Response
   */
  public function destroy(FormerBoardMember $formerBoardMember)
  {
    $formerBoardMember->delete();
    return response()->json('successfully deleted');
  }
}
