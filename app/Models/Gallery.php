<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  use HasFactory;	
  
  protected $fillable = [
    'slug',
    'title',
    'subtitle',
    'text',
    'credits',
    'link_text',
    'hover_text',
    'publish',
    'order',
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable')->orderBy('order');
  }

  public function publishedImages()
  {
    return $this->morphMany(Image::class, 'imageable')->where('publish', 1)->orderBy('order');
  }

  public function videos()
  {
    return $this->morphMany(Video::class, 'videoable');
  }

  public function publishedVideos()
  {
    return $this->morphMany(Video::class, 'videoable')->where('publish', 1);
  }

	public function articles()
	{
		return $this->belongsToMany(Article::class);
	}
}
