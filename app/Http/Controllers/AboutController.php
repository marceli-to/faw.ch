<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\History;
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
    $history = History::published()->with('publishedImages', 'publishedFiles', 'publishedArticles')->get()->first();
    $board   = Board::published()->with('publishedImages', 'publishedMembers')->get()->first();
    return view($this->viewPath . 'index', ['history' => $history, 'board' => $board]);
  }

}