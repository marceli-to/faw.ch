<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Base
{
  use HasFactory;
  
	protected $fillable = [
    'title',
    'subtitle',
    'abstract',
    'text',
    'date',
		'time',
    'publish',
    'sticky'
	];

  protected $appends = [
    'past'
  ];

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function image()
  {
    return $this->morphOne(Image::class, 'imageable');
  }

  public function publishedImage()
  {
    return $this->morphOne(Image::class, 'imageable')->where('publish', 1);
  }

  public function files()
  {
    return $this->morphMany(File::class, 'fileable');
  }

	/**
   * Scope for upcoming events
   */

	public function scopeUpcoming($query)
	{
		$constraint = date('Y-m-d', time());
		return $query->where('date', '>=', $constraint)->where('publish', 1);
	}

	/**
   * Scope for past events
   */

	public function scopePast($query)
	{
		$constraint = date('Y-m-d', time());
		return $query->where('date', '<', $constraint)->where('publish', 1);
	}

	/**
   * Scope for sticky events
   */

	public function scopeSticky($query)
	{
		return $query->where('sticky', 1)->where('publish', 1);
	}

	/**
   * Scope for archived events
   */

	public function scopeArchive($query)
	{
		$constraint = date('Y-m-d', time());
		return $query->where('date', '<', $constraint)->where('publish', 1);
	}

  /**
   * Accessor for date
   * @param Date $value
   */

  public function setDateAttribute($value)
  {
    $this->attributes['date'] = $value ? date('Y.m.d', strtotime($value)) : NULL;
  }

  /**
   * Accessor for time
   * @param Date $value
   */

  public function setTimeAttribute($value)
  {
    $this->attributes['time'] = $value ? $value : NULL;
  }

  /**
   * Mutator for date (formated date)
   * @param Date $value
   */

  public function getDateAttribute($value)
  {
    return $value ? strftime('%d.%m.%Y', strtotime($value)) : null;
  }

  /**
   * Mutator for date (slug)
   * @param Date $value
   */

  public function getDateSlugAttribute($value)
  {
    return date('Y.m.d', strtotime($value));
  }

  /**
   * Mutator for date
   * @param Date $value
   */

  public function getDateFullAttribute()
  {
    return date('D j.n.Y', strtotime($this->date));
  }

  /**
   * Mutator for time
   * @param Date $value
   */

  public function getTimeFullAttribute()
  {
    return date('H.i', strtotime($this->time));
  }

  /**
   * Add attribute for past events
   */
  public function past()
  {
    return time() > strtotime($this->date);
  }

  /**
   * Mutator for past attribure
   * @param Date $value
   */

  public function getPastAttribute($value)
  {
    return $this->past();
  }

}
