<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityArticle extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish',
    'order',
    'activity_id'
  ];

  public function activity()
  {
    return $this->belongsTo(Activity::class, 'activity_id', 'id');
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  public function publishedFiles()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  public function links()
  {
    return $this->morphMany(Link::class, 'linkable');
  }

  public function publishedLinks()
  {
    return $this->morphMany(Link::class, 'linkable');
  }

}
