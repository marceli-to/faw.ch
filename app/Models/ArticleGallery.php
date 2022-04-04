<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleGallery extends Model
{
  use HasFactory;

  protected $table = 'article_gallery';

	protected $fillable = [
		'article_id',
		'gallery_id',
  ];
}
