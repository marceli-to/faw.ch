<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Base
{
  use HasFactory, SoftDeletes;

  protected $casts = [
    'created_at' => "datetime:d.m.Y",
  ];

	protected $fillable = [
    'code',
    'title',
    'publish',
    'videoable_id',
    'videoable_type'
  ];

  public function videoable()
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

}
