<?php
namespace App\Models;
use App\Models\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormerBoardMember extends Base
{
  use HasFactory;

	protected $fillable = [
    'description',
    'former_board_member_type_id',
	];

  public function type()
  {
    return $this->hasOne(FormerBoardMemberType::class, 'id', 'former_board_member_type_id');
  }

}
