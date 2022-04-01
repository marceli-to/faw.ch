<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Board;
use App\Models\BoardMember;
use App\Http\Requests\BoardMemberStoreRequest;
use Illuminate\Http\Request;

class BoardMemberController extends Controller
{
  /**
   * Get a list of members
   * 
   * @param Board $board
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get(Board $board, $constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(BoardMember::published()->where('board_id', $board->id)->get());
    }
    return new DataCollection(BoardMember::where('board_id', $board->id)->get());
  }

  /**
   * Get a single member
   * 
   * @param BoardMember $member
   * @return \Illuminate\Http\Response
   */
  public function find(BoardMember $member)
  {
    $member = BoardMember::find($member->id);
    return response()->json($member);
  }

  /**
   * Store a newly created member
   *
   * @param  \Illuminate\Http\BoardMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(BoardMemberStoreRequest $request)
  {
    $member = BoardMember::create($request->all());
    $member->save();
    return response()->json(['memberId' => $member->id]);
  }

  /**
   * Update a member for a given member
   *
   * @param BoardMember $member
   * @param  \Illuminate\Http\BoardMemberStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(BoardMember $member, BoardMemberStoreRequest $request)
  {
    $member = BoardMember::findOrFail($member->id);
    $member->update($request->all());
    $member->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given member
   *
   * @param  BoardMember $member
   * @return \Illuminate\Http\Response
   */
  public function toggle(BoardMember $member)
  {
    $member->publish = $member->publish == 0 ? 1 : 0;
    $member->save();
    return response()->json($member->publish);
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
      $i = BoardMember::find($item['id']);
      $i->order = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a member
   *
   * @param  BoardMember $member
   * @return \Illuminate\Http\Response
   */
  public function destroy(BoardMember $member)
  {
    $member->delete();
    return response()->json('successfully deleted');
  }
}
