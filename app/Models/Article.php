<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'publish',
    'order',
    'page_id',
  ];

  public function page()
  {
    return $this->belongsTo(Page::class, 'page_id', 'id');
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function publishedImage()
  {
    return $this->morphOne(Image::class, 'imageable')->where('publish', 1);
  }

	public function galleries()
	{
		return $this->belongsToMany(Gallery::class)->orderBy('order');
	}

}
