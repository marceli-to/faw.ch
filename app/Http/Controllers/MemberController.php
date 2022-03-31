<?php
namespace App\Http\Controllers;
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
    return view($this->viewPath . 'index');
  }

}
