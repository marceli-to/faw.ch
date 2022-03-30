<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Resources\DataCollection;
use App\Models\AnnualProgram;
use App\Models\Image;
use App\Models\File;
use App\Http\Requests\AnnualProgramStoreRequest;
use Illuminate\Http\Request;

class AnnualProgramController extends Controller
{
  /**
   * Get a list of programs
   * 
   * @param String $constraint
   * @return \Illuminate\Http\Response
   */
  public function get($constraint = NULL)
  {
    if ($constraint == 'publish')
    {
      return new DataCollection(AnnualProgram::with('images')->published()->get());
    }
    return new DataCollection(AnnualProgram::orderBy('periode_start', 'DESC')->get());
  }

  /**
   * Get a single program
   * 
   * @param AnnualProgram $program
   * @return \Illuminate\Http\Response
   */
  public function find(AnnualProgram $program)
  {
    $program = AnnualProgram::with('images', 'files', 'articles', 'articlesSpecial')->find($program->id);
    return response()->json($program);
  }

  /**
   * Store a newly created program
   *
   * @param  \Illuminate\Http\AnnualProgramStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function store(AnnualProgramStoreRequest $request)
  {
    $program = AnnualProgram::create($request->all());
    $program->save();
    $this->handleImages($program, $request->input('images'));
    $this->handleFiles($program, $request->input('files'));
    return response()->json(['programId' => $program->id]);
  }

  /**
   * Update a program for a given program
   *
   * @param AnnualProgram $program
   * @param  \Illuminate\Http\AnnualProgramStoreRequest $request
   * @return \Illuminate\Http\Response
   */
  public function update(AnnualProgram $program, AnnualProgramStoreRequest $request)
  {
    $program = AnnualProgram::findOrFail($program->id);
    $program->update($request->all());
    $program->save();
    $this->handleImages($program, $request->input('images'));
    $this->handleFiles($program, $request->input('files'));
    return response()->json('successfully updated');
  }

  /**
   * Toggle the status a given program
   *
   * @param  AnnualProgram $program
   * @return \Illuminate\Http\Response
   */
  public function toggle(AnnualProgram $program)
  {
    $program->publish = $program->publish == 0 ? 1 : 0;
    $program->save();
    return response()->json($program->publish);
  }

  /**
   * Clone a given program
   *
   * @param  AnnualProgram $program
   * @return \Illuminate\Http\Response
   */
  public function clone(AnnualProgram $program)
  {
    $program = AnnualProgram::with('articles', 'articlesSpecial')->find($program->id);
    $clone = $program->replicate();
    $clone->title = $clone->title . ' [Kopie]';
    $clone->save();
    return response()->json('successfully cloned');
  }

  /**
   * Remove a program
   *
   * @param  AnnualProgram $program
   * @return \Illuminate\Http\Response
   */
  public function destroy(AnnualProgram $program)
  {
    $program = AnnualProgram::with('images', 'files', 'articles', 'articlesSpecial')->find($program->id);
    $program->images()->delete();
    $program->files()->delete();
    $program->articles()->delete();
    $program->articlesSpecial()->delete();
    $program->delete();
    return response()->json('successfully deleted');
  }

  /**
   * Handle associated images
   *
   * @param AnnualProgram $program
   * @param Array $images
   * @return void
   */  

  protected function handleImages(AnnualProgram $program, $images = NULL)
  {
    foreach($images as $image)
    {
      $img = Image::findOrFail($image['id']);
      $img->imageable_id = $program->id;
      $img->imageable_type = AnnualProgram::class;
      $img->save();
    }
  }

  /**
   * Handle associated files
   *
   * @param AnnualProgram $program
   * @param Array $files
   * @return void
   */  

  protected function handleFiles(AnnualProgram $program, $files = NULL)
  {
    foreach($files as $file)
    {
      $img = File::findOrFail($file['id']);
      $img->fileable_id = $program->id;
      $img->fileable_type = AnnualProgram::class;
      $img->save();
    }
  }
}
