<?php
namespace App\Http\Controllers;
use App\Models\Partner;
use App\Models\Backer;
use App\Models\Member;
use App\Http\Requests\MemberStoreRequest;
use App\Events\MemberRegistration;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class MemberController extends BaseController
{
  protected $viewPath = 'pages.member.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the member page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    // Get backers
    $backers = Backer::published()->orderBy('name', 'ASC')->get();
    $backersGrouped = $backers->groupBy('type.description');

    // Get partners
    $partners = Partner::published()->orderBy('name', 'DESC')->get();
    return view($this->viewPath . 'index', ['backers' => $backersGrouped->all(), 'partners' => $partners]);
  }

  /**
   * Store a new member
   *
   * @param  \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function register(MemberStoreRequest $request)
  {
    $member = Member::create($request->all());
    event(new MemberRegistration($member));
    return response()->json(['memberId' => $member->id]);
  }

}
