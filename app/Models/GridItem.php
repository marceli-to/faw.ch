<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GridItem extends Model
{
  use HasFactory;

  protected $fillable = [
    'event_id',
    'teaser_id',
    'order'
  ];

  public function event()
  {
    return $this->hasOne(Event::class, 'id', 'event_id');
  }

  public function teaser()
  {
    return $this->hasOne(Teaser::class, 'id', 'teaser_id');
  }
}
