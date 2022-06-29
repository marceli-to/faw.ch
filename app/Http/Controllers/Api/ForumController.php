<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\Forum;
use App\Models\Image;
use App\Models\File;
use App\Http\Requests\ForumStoreRequest;
use Illuminate\Http\Request;

class ForumController extends Controller
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
      return new DataCollection(Forum::published()->get());
    }
    return new DataCollection(Forum::get());
  }

  /**
   * Get a single forum
   * 
   * @param Forum $forum
   * @return \Illuminate\Http\Response
   */
  public function find(Forum $forum)
  {
    $forum = Forum::with('images', 'files', 'articles')->find($forum->id);
    return response()->json($forum);
  }

  /**
   * Store a newly created forum
   *
   * @param  \Illuminate\Http\ForumStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(ForumStoreRequest $request)
  {
    $forum = Forum::create($request->all());
    $forum->save();
    $this->handleImages($forum, $request->input('images'));
    $this->handleFiles($forum, $request->input('files'));
    return response()->json(['forumId' => $forum->id]);
  }

  /**
   * Update a forum for a given forum
   *
   * @param Forum $forum
   * @param  \Illuminate\Http\ForumStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(Forum $forum, ForumStoreRequest $request)
  {
    $forum = Forum::findOrFail($forum->id);
    $forum->update($request->all());
    $forum->save();
    $this->handleImages($forum, $request->input('images'));
    $this->handleFiles($forum, $request->input('files'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given forum
   *
   * @param  Forum $forum
   * @return \Illuminate\Http\Response
   */
  public function toggle(Forum $forum)
  {
    $forum->publish = $forum->publish == 0 ? 1 : 0;
    $forum->save();
    return response()->json($forum->publish);
  }

  /**
   * Remove a forum
   *
   * @param  Forum $forum
   * @return \Illuminate\Http\Response
   */
  public function destroy(Forum $forum)
  {
    $forum = Forum::with('files', 'articles')->find($forum->id);
    $forum->files()->delete();
    $forum->articles()->delete();
    $forum->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param Forum $forum
   * @param Array $images
   * @return void
   */  

  protected function handleImages(Forum $forum, $images = NULL)
  {
    if ($images)
    {
      foreach($images as $image)
      {
        $img = Image::findOrFail($image['id']);
        $img->imageable_id = $forum->id;
        $img->imageable_type = Forum::class;
        $img->save();
      }
    }
  }

  /**
   * Handle associated files
   *
   * @param Forum $forum
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(Forum $forum, $files = NULL)
  {
    if ($files)
    {
      foreach($files as $file)
      {
        $img = File::findOrFail($file['id']);
        $img->fileable_id = $forum->id;
        $img->fileable_type = Forum::class;
        $img->save();
      }
    }
  }
}
