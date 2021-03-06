<?php
namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class ContactController extends BaseController
{
  protected $viewPath = 'pages.contact.';

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Show the contact page
   *
   * @return \Illuminate\Http\Response
   */

  public function index()
  {
    return view($this->viewPath . 'index');
  }

}
