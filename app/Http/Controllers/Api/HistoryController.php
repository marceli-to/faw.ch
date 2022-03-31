<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\History;
use App\Models\Image;
use App\Models\File;
use App\Http\Requests\HistoryStoreRequest;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
  /**
   * Get a list of histories
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(History::published()->get());
    }
    return new DataCollection(History::get());
  }

  /**
   * Get a single history
   * 
   * @param History $history
   * @return \Illuminate\Http\Response
   */
  public function find(History $history)
  {
    $history = History::with('images', 'files', 'articles')->find($history->id);
    return response()->json($history);
  }

  /**
   * Store a newly created history
   *
   * @param  \Illuminate\Http\HistoryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(HistoryStoreRequest $request)
  {
    $history = History::create($request->all());
    $history->save();
    $this->handleImages($history, $request->input('images'));
    $this->handleFiles($history, $request->input('files'));
    return response()->json(['historyId' => $history->id]);
  }

  /**
   * Update a history for a given history
   *
   * @param History $history
   * @param  \Illuminate\Http\HistoryStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(History $history, HistoryStoreRequest $request)
  {
    $history = History::findOrFail($history->id);
    $history->update($request->all());
    $history->save();
    $this->handleImages($history, $request->input('images'));
    $this->handleFiles($history, $request->input('files'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given history
   *
   * @param  History $history
   * @return \Illuminate\Http\Response
   */
  public function toggle(History $history)
  {
    $history->publish = $history->publish == 0 ? 1 : 0;
    $history->save();
    return response()->json($history->publish);
  }

  /**
   * Remove a history
   *
   * @param  History $history
   * @return \Illuminate\Http\Response
   */
  public function destroy(History $history)
  {
    $history = History::with('files', 'articles')->find($history->id);
    $history->files()->delete();
    $history->articles()->delete();
    $history->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param History $history
   * @param Array $images
   * @return void
   */  

  protected function handleImages(History $history, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $history->id;
      $img->imageable_type = History::class;
      $img->save();
    }
  }

  /**
   * Handle associated files
   *
   * @param History $history
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(History $history, $files = NULL)
  {
    if ($files)
    {
      foreach($files as $file)
      {
        $img = File::findOrFail($file['id']);
        $img->fileable_id = $history->id;
        $img->fileable_type = History::class;
        $img->save();
      }
    }
  }
}
