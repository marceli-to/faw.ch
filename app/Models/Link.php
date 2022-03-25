<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Base
{
  use HasFactory, SoftDeletes;

  protected $casts = [
    'created_at' => "datetime:d.m.Y",
  ];

	protected $fillable = [
    'uuid',
    'title',
    'url',
    'target',
    'publish',
    'locked',
    'linkable_id',
    'linkable_type'
  ];

  public function linkable()
  {
    return $this->morphTo();
  }

	/**
   * Scope for published images
   */

	public function scopePublish($query)
	{
		return $query->where('publish', 1);
	}

	/**
   * Scope for locked images
   */

	public function scopeLocked($query)
	{
		return $query->where('locked', 1);
	}

  /**
   * Mutator for url
   * -> fix missung protocol for urls
   * 
   * @param String $value
   */

  public function setUrlAttribute($value)
  {
    $this->attributes['url'] = (!preg_match("~^(?:f|ht)tps?://~i", $value) && $value) ? "https://" . $value : $value;
  }

  public function getUrlAttribute()
  {
    return (!preg_match("~^(?:f|ht)tps?://~i", $this->attributes['url']) && $this->attributes['url']) ? "https://" . $this->attributes['url'] : $this->attributes['url'];
  }
}
