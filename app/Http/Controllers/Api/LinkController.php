<?php
namespace App\Http\Controllers\Api;
use App\Models\Link;
use App\Http\Resources\DataCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LinkStoreRequest;

class LinkController extends Controller
{
  /**
   * Get a list of links
   * 
   * @return \Illuminate\Http\Response
   */
  public function get()
  {
    return new DataCollection(Link::orderBy('created_at')->get());
  }

  /**
   * Get a single link for a given link
   * 
   * @param Link $link
   * @return \Illuminate\Http\Response
   */
  public function find(Link $link)
  {
    $link = Link::findOrFail($link->id);
    return response()->json($link);
  }

  /**
   * Store a newly added link
   *
   * @param  \Illuminate\Http\LinkStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(LinkStoreRequest $request)
  {
    $data = $request->all();

    // Generate UUID
    $data['uuid'] = \Str::uuid();

    // Add imagable id & type
    $data['linkable_id']   = $request->input('linkable_id') ? $request->input('linkable_id') : NULL;
    $data['linkable_type'] = $request->input('linkable_type') ? "App\Models\\" . $request->input('linkable_type') : NULL;

    // Create link
    $link = Link::create($data);
    $link->save();
    return response()->json(['linkId' => $link->id]);
  }

  /**
   * Update a link for a given link
   *
   * @param Link $link
   * @param  \Illuminate\Http\LinkStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Link $link, LinkStoreRequest $request)
  {
    $link = Link::findOrFail($link->id);
    $link->update($request->all());
    return response()->json('successfully updated');
  }

  /**
   * Update the order of the given links
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */

  public function order(Request $request)
  {
    $links = $request->get('links');

    foreach($links as $link)
    {
      $i = Link::find($link['id']);
      $i->order = $link['order'];
      $i->save(); 
    }
    
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given link
   *
   * @param  Link $link
   * @return \Illuminate\Http\Response
   */
  public function toggle(Link $link)
  {
    $link->publish = $link->publish == 0 ? 1 : 0;
    $link->save();
    return response()->json($link->publish);
  }

  /**
   * Remove the specified link from storage
   *
   * @param  string $link
   * @return \Illuminate\Http\Response
   */
  
  public function destroy(Link $link)
  {
    $link->delete();
    return response()->json('successfully deleted');
  }

}
