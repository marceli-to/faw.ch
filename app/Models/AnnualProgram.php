<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualProgram extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'periode_start',
    'periode_end',
    'publish'
  ];

  protected $appends = [
    'periode',
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function publishedImages()
  {
    return $this->morphMany(Image::class, 'imageable')->where('publish', 1);
  }

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  public function publishedFiles()
  {
    return $this->morphMany(File::class, 'fileable')->where('publish', 1);
  }

  public function articles()
  {
    return $this->hasMany(AnnualProgramArticle::class, 'annual_program_id','id')
                ->orderBy('order', 'ASC')
                ->where('special', 0);
  }

  public function publishedArticles()
  {
    return $this->hasMany(AnnualProgramArticle::class, 'annual_program_id','id')
                ->orderBy('order', 'ASC')
                ->where('special', 0)
                ->where('publish', 1);
  }

  public function articlesSpecial()
  {
    return $this->hasMany(AnnualProgramArticle::class, 'annual_program_id','id')
                ->orderBy('order', 'ASC')
                ->where('special', 1);
  }

  public function publishedArticlesSpecial()
  {
    return $this->hasMany(AnnualProgramArticle::class, 'annual_program_id','id')
                ->orderBy('order', 'ASC')
                ->where('special', 1)
                ->where('publish', 1);
  }

  /**
   * Mutator for periode
   * @param Date $value
   */

  public function getPeriodeAttribute()
  {
    if ($this->periode_start && $this->periode_end)
    {
      return $this->periode_start . '/' . $this->periode_end;
    }
    return NULL;
  }
}
