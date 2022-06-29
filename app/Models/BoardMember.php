<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardMember extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'text',
    'publish',
    'order',
    'board_id'
  ];

  public function board()
  {
    return $this->belongsTo(Board::class, 'board_id', 'id');
  }
}
