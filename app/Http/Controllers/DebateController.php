<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Activity;
use Illuminate\Http\Request;

class DebateController extends BaseController
{
  protected $viewPath = 'pages.debate.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the homepage
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $activity = Activity::published()->with('publishedArticles.publishedFiles', 'publishedArticles.publishedLinks')->get()->first();
    return view($this->viewPath . 'index', ['activity' => $activity]);
  }

}
