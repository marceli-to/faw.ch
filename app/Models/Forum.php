<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish'
  ];

  public function articles()
  {
    return $this->hasMany(ForumArticle::class, 'forum_id','id')->orderBy('order', 'ASC');
  }

  public function publishedArticles()
  {
    return $this->hasMany(ForumArticle::class, 'forum_id','id')->orderBy('order', 'ASC')->where('publish', 1);
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  public function publishedFiles()
  {
    return $this->morphMany(File::class, 'fileable')->orderBy('order', 'ASC');
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function publishedImages()
  {
    return $this->morphMany(Image::class, 'imageable')->where('publish', 1);
  }
}
