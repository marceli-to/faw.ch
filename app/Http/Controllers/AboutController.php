<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\Forum;
use App\Models\Board;
use Illuminate\Http\Request;

class AboutController extends BaseController
{
  protected $viewPath = 'pages.about.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the about page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    $forum = Forum::published()->with('publishedImages', 'publishedFiles', 'publishedArticles')->get()->first();
    $board   = Board::published()->with('publishedImages', 'publishedMembers')->get()->first();
    return view($this->viewPath . 'index', ['forum' => $forum, 'board' => $board]);
  }

}
