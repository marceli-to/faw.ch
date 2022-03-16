<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTeaser extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'link',
    'target',
    'publish'
  ];

  public function images()
  {
    return $this->morphMany(Asset::class, 'imageable');
  }

	// public function images()
	// {
  //   return $this->hasMany(HomeTeaserImage::class, 'home_teaser_id', 'id');
	// }

	// public function image()
	// {
  //   return $this->hasOne(HomeTeaserImage::class, 'home_teaser_id', 'id');
	// }

  /**
   * Accessor for 'link'
   */

  public function setLinkAttribute($value)
  {
    $this->attributes['link'] = (!preg_match("~^(?:f|ht)tps?://~i", $value)) ? "https://" . $value : $value;
  }

  /**
   * Accessor for 'target'
   */

  public function setTargetAttribute()
  {
    $this->attributes['target'] = ($this->link && ('forum-architektur.ch' !== '' && mb_strpos($this->link, 'forum-architektur.ch') !== false)) ? '_self' : '_blank'; 
  }


}
