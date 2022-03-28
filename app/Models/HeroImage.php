<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroImage extends Base
{
  use HasFactory;

	protected $fillable = [
    'slug',
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function publishedImages()
  {
    return $this->morphMany(Image::class, 'imageable')->where('publish', 1);
  }
}
