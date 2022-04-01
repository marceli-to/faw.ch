<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Board;
use App\Models\Image;
use App\Models\File;
use App\Http\Requests\BoardStoreRequest;
use Illuminate\Http\Request;

class BoardController extends Controller
{
  /**
   * Get a list of boards
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(Board::published()->get());
    }
    return new DataCollection(Board::get());
  }

  /**
   * Get a single board
   * 
   * @param Board $board
   * @return \Illuminate\Http\Response
   */
  public function find(Board $board)
  {
    $board = Board::with('images', 'members')->find($board->id);
    return response()->json($board);
  }

  /**
   * Store a newly created board
   *
   * @param  \Illuminate\Http\BoardStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(BoardStoreRequest $request)
  {
    $board = Board::create($request->all());
    $board->save();
    $this->handleImages($board, $request->input('images'));
    return response()->json(['boardId' => $board->id]);
  }

  /**
   * Update a board for a given board
   *
   * @param Board $board
   * @param  \Illuminate\Http\BoardStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Board $board, BoardStoreRequest $request)
  {
    $board = Board::findOrFail($board->id);
    $board->update($request->all());
    $board->save();
    $this->handleImages($board, $request->input('images'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given board
   *
   * @param  Board $board
   * @return \Illuminate\Http\Response
   */
  public function toggle(Board $board)
  {
    $board->publish = $board->publish == 0 ? 1 : 0;
    $board->save();
    return response()->json($board->publish);
  }

  /**
   * Remove a board
   *
   * @param  Board $board
   * @return \Illuminate\Http\Response
   */
  public function destroy(Board $board)
  {
    $board = Board::with('members')->find($board->id);
    $board->members()->delete();
    $board->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Board $board
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Board $board, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $board->id;
      $img->imageable_type = Board::class;
      $img->save();
    }
  }
}
