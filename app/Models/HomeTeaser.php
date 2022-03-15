<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeTeaser extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'link',
    'publish'
  ];


	public function images()
	{
    return $this->hasMany(HomeTeaserImage::class, 'home_teaser_id', 'id');
	}

	public function image()
	{
    return $this->hasOne(HomeTeaserImage::class, 'home_teaser_id', 'id');
	}
}
