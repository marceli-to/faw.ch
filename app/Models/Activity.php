<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'text',
    'publish'
  ];

  public function articles()
  {
    return $this->hasMany(ActivityArticle::class, 'activity_id','id')->orderBy('order', 'ASC');
  }

  public function publishedArticles()
  {
    return $this->hasMany(ActivityArticle::class, 'activity_id','id')->orderBy('order', 'ASC')->where('publish', 1);
  }
}
