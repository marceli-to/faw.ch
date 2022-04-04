<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Backer;
use App\Http\Requests\BackerStoreRequest;
use Illuminate\Http\Request;

class BackerController extends Controller
{
  /**
   * Get a list of backers
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Backer::with('type')->published()->orderBy('name', 'ASC')->get());
    }
    $backers = Backer::orderBy('name', 'ASC')->get();
    $backersGrouped = $backers->groupBy('type.description');
    return response()->json($backersGrouped->all());
  }

  /**
   * Get a single backer
   * 
   * @param Backer $backer
   * @return \Illuminate\Http\Response
   */
  public function find(Backer $backer)
  {
    $backer = Backer::find($backer->id);
    return response()->json($backer);
  }

  /**
   * Store a newly created backer
   *
   * @param  \Illuminate\Http\BackerStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(BackerStoreRequest $request)
  {
    $backer = Backer::create($request->all());
    $backer->save();
    return response()->json(['backerId' => $backer->id]);
  }

  /**
   * Update a backer for a given backer
   *
   * @param Backer $backer
   * @param  \Illuminate\Http\BackerStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Backer $backer, BackerStoreRequest $request)
  {
    $backer = Backer::findOrFail($backer->id);
    $backer->update($request->all());
    $backer->save();
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given backer
   *
   * @param  Backer $backer
   * @return \Illuminate\Http\Response
   */
  public function toggle(Backer $backer)
  {
    $backer->publish = $backer->publish == 0 ? 1 : 0;
    $backer->save();
    return response()->json($backer->publish);
  }

  /**
   * Remove a backer
   *
   * @param  Backer $backer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Backer $backer)
  {
    $backer->delete();
    return response()->json('successfully deleted');
  }
}
