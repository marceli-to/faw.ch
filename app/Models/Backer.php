<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backer extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'city',
    'publish',
    'backer_type_id',
	];

  public function type()
  {
    return $this->hasOne(BackerType::class, 'id', 'backer_type_id');
  }
}
