<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualProgramArticle extends Base
{
  use HasFactory;

	protected $fillable = [
    'title',
    'subtitle',
    'text',
    'publish',
    'special',
    'order',
    'annual_program_id'
  ];

  public function program()
  {
    return $this->belongsTo(AnnualProgram::class, 'annual_program_id', 'id');
  }
}
