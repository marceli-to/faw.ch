<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTeaserImage extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'orientation',
		'coords_w',
    'coords_h',
    'coords_x',
    'coords_y',
    'order',
    'publish',
    'home_teaser_id'
	];
  
  public function teaser()
  {
    return $this->belongsTo(HomeTeaser::class);
  }

	/**
	 * Get the cropping coordinates
	 *
	 * @return string
	 */

	public function getCoordsAttribute()
	{
    $coords = '0,0,0,0';
    if ($this->coords_w && $this->coords_h)
    {
      $coords = floor($this->coords_w) . ',' .  floor($this->coords_h) . ',' .  floor($this->coords_x) . ',' .  floor($this->coords_y);
    }
    return $coords;
  }

	/**
	 * Get the image ratio
	 *
	 * @return string
	 */
  
	public function getRatioAttribute()
	{
    if (($this->coords_w && $this->coords_h) && ($this->coords_w > $this->coords_h))
    {
      return 'wide';
    }
    return '';
  }
}
