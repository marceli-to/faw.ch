<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teaser extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'publish'
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable')->where('publish', 1);
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

  public function links()
  {
    return $this->morphMany(Link::class, 'linkable');
  }

  public function link()
  {
    return $this->morphOne(Link::class, 'linkable')->where('publish', 1);
  }

  public function gridItem()
  {
    return $this->belongsTo(GridItem::class, 'id', 'teaser_id');
  }
}
