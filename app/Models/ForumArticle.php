<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumArticle extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish',
    'order',
    'forum_id'
  ];

  public function forum()
  {
    return $this->belongsTo(Forum::class, 'forum_id', 'id');
  }
}
