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
    'link',
    'target',
    'publish'
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

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
