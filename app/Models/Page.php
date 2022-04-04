<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'publish'
  ];

  public function articles()
  {
    return $this->hasMany(Article::class, 'page_id','id')->orderBy('order', 'ASC');
  }

  public function images()
  {
    return $this->morphMany(Image::class, 'imageable');
  }
}
