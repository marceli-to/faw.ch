<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\GridItem;
use Illuminate\Http\Request;

class GridItemController extends Controller
{
  /**
   * Get a list of grid items
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    $events = GridItem::with('event')->whereNotNull('event_id')->get();
    $teasers = GridItem::with('teaser.image')->whereNotNull('teaser_id')->get();
    
    $data = ['events' => $events, 'teasers' => $teasers];
    return response()->json($data);
  }

  /**
   * Remove a grid item
   *
   * @param  GridItem $gridItem
   * @return \Illuminate\Http\Response
   */
  public function destroy(GridItem $gridItem)
  {
    $gridItem->delete();
    return response()->json('successfully deleted');
  }


}
