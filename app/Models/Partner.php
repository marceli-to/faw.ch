<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'url',
    'sort',
    'publish',
	];

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
}
