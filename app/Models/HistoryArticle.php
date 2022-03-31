<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryArticle extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish',
    'order',
    'history_id'
  ];

  public function history()
  {
    return $this->belongsTo(History::class, 'history_id', 'id');
  }
}
