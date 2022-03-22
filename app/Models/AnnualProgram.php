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

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }
}
