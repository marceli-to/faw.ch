<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish'
  ];

  public function members()
  {
    return $this->hasMany(BoardMember::class, 'board_id','id')->orderBy('order', 'ASC');
  }

  public function publishedMembers()
  {
    return $this->hasMany(BoardMember::class, 'board_id','id')->orderBy('order', 'ASC')->where('publish', 1);
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }

  public function publishedImages()
  {
    return $this->morphMany(Image::class, 'imageable')->where('publish', 1);
  }
}
