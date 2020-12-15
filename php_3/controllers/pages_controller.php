<?php
require_once('base_controller.php');
require_once(__DIR__ . '/../models/user.php');

class UsersController extends BaseController
{
  function __construct()
  {
    $this->folder = 'pages';
  }

  public function index()
  {
    $users = User::sitelist();
    $data = array('pages' => $page);
    $this->render('index', $data);
  }

  public function show()
  {
    $user = User::find($_GET['id']);
    $data = array('pages' => $page);
    $this->render('show', $data);
  }

}