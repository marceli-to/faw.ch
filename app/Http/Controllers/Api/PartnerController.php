<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Partner;
use App\Http\Requests\PartnerStoreRequest;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
  /**
   * Get a list of partners
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Partner::published()->orderBy('sort')->orderBy('name', 'ASC')->get());
    }
    return new DataCollection(Partner::orderBy('sort')->orderBy('name', 'ASC')->get());
  }

  /**
   * Get a single partner
   * 
   * @param Partner $partner
   * @return \Illuminate\Http\Response
   */
  public function find(Partner $partner)
  {
    $partner = Partner::find($partner->id);
    return response()->json($partner);
  }

  /**
   * Store a newly created partner
   *
   * @param  \Illuminate\Http\PartnerStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(PartnerStoreRequest $request)
  {
    $partner = Partner::create($request->all());
    $partner->save();
    return response()->json(['partnerId' => $partner->id]);
  }

  /**
   * Update a partner for a given partner
   *
   * @param Partner $partner
   * @param  \Illuminate\Http\PartnerStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Partner $partner, PartnerStoreRequest $request)
  {
    $partner = Partner::findOrFail($partner->id);
    $partner->update($request->all());
    $partner->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given partner
   *
   * @param  Partner $partner
   * @return \Illuminate\Http\Response
   */
  public function toggle(Partner $partner)
  {
    $partner->publish = $partner->publish == 0 ? 1 : 0;
    $partner->save();
    return response()->json($partner->publish);
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
      $i = Partner::find($item['id']);
      $i->sort = $item['order'];
      $i->save(); 
    }
    return response()->json('successfully updated');
  }

  /**
   * Remove a partner
   *
   * @param  Partner $partner
   * @return \Illuminate\Http\Response
   */
  public function destroy(Partner $partner)
  {
    $partner->delete();
    return response()->json('successfully deleted');
  }
}
