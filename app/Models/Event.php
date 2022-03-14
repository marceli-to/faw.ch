<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Base
{
  use HasFactory, SoftDeletes;

	protected $fillable = [
    'uuid',
    'number',
    'title',
    'description',
    'date',
		'time',
    'location',
    'maps',
    'type',
    'fees',
    'remarks',
    'fully_booked',
    'members_only',
    'members_restrictions_text',
    'covid_restrictions',
    'covid_restrictions_text',
    'special',
    'publish',
	];

  /**
   * Relations
   */

  public function bookings()
  {
    return $this->hasMany(Booking::class, 'event_id', 'id');
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
   * Scope for special events
   */

	public function scopeSpecial($query)
	{
		return $query->where('special', 1);
	}

	/**
   * Scope for non-special-events
   */

	public function scopeStandard($query)
	{
		return $query->where('special', 0);
	}


  /**
   * Accessor for date
   * @param Date $value
   */

  public function setDateAttribute($value)
  {
    $this->attributes['date'] = date('Y.m.d', strtotime($value));
  }

  /**
   * Mutator for date
   * @param Date $value
   */

  public function getDateAttribute($value)
  {
    return strftime('%d/%m/%Y', strtotime($value));
  }

  /**
   * Mutator for date
   * @param Date $value
   */

  public function getDateSlugAttribute($value)
  {
    return date('Y.m.d', strtotime($value));
  }

  /**
   * Mutator for year
   * @param Date $value
   */

  public function getDateYearAttribute()
  {
    return date('Y', strtotime(str_replace('/', '.', $this->date)));
  }

  /**
   * Mutator for year
   * @param Date $value
   */

  public function getDateCancelAttribute()
  {
    return date('d/m/Y', strtotime(str_replace('/', '.', $this->date)) - 7 * 86400);
  }
}
