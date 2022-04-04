<?php

namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Base
{
  use HasFactory;

	protected $fillable = [
    'name',
    'firstname',
    'address',
    'zip',
    'city',
    'phone',
    'email',
    'type'
	];
}
