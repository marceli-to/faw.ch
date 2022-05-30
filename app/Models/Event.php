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
    'sticky',
    'placeholder',
	];

  protected $appends = [
    'past',
    'year',
    'periode',
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

  public function file()
  {
    return $this->morphMany(File::class, 'fileable')->where('publish', 1);
  }

  public function gridItem()
  {
    return $this->belongsTo(GridItem::class, 'id', 'event_id');
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
   * Scope for upcoming or sticky events
   */

	public function scopeUpcomingOrStickyOrPlaceholder($query)
	{
		$constraint = date('Y-m-d', time());
		return $query->where('date', '>=', $constraint)->where('publish', 1)->orWhere('sticky', 1)->orWhere('placeholder', 1);
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
   * Scope for placeholder events
   */

	public function scopePlaceholder($query)
	{
		return $query->where('placeholder', 1)->where('publish', 1);
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
   * Mutator for year
   * @param Date $value
   */

  public function getYearAttribute()
  {
    return $this->date ? strftime('%Y', strtotime($this->date)) : NULL;
  }

  /**
   * Mutator for periode
   * @param Date $value
   */

  public function getPeriodeAttribute()
  {
    if ($this->date)
    {
      $break = 7;
      $month = date('n', strtotime($this->date));
      $periode = [];

      if ($month < $break)
      {
        $periode['start'] = (int) date('Y', strtotime($this->date)) - 1;
        $periode['end']   = (int) date('Y', strtotime($this->date));
      }
      else
      {
        $periode['start'] = (int) date('Y', strtotime($this->date));
        $periode['end']   = (int) date('Y', strtotime($this->date)) + 1;
      }

      return implode('/', $periode);
    }

   return NULL;
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
   * 
   */

  public function getDateFullAttribute()
  {
    return date('D j.n.Y', strtotime($this->date));
  }

  /**
   * Mutator for time
   * 
   */

  public function getTimeFullAttribute()
  {
    return date('H.i', strtotime($this->time));
  }

  /**
   * Mutator for date and time
   * 
   */

  public function getDateTimeAttribute()
  { 
    if (!$this->date)
    {
      return NULL;
    }

    if (!$this->past)
    {
      if ($this->time)
      {
        return date('D j.n.Y', strtotime($this->date)) . ', ' . date('H.i', strtotime($this->time)) . ' Uhr';
      }
      return date('D j.n.Y', strtotime($this->date));
    }
    else
    {
      return date('D j.n.Y', strtotime($this->date));
    }
  }

  /**
   * Add attribute for past events
   */
  public function past()
  {
    return time() > strtotime($this->date) + 86400;
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
