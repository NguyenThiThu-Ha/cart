<?php
require_once('controllers/base_controller.php');
require_once('models/post.php');

class PostsController extends BaseController
{
  function __construct()
  {
    $this->folder = 'posts';
  }

  public function index()
  {
    $posts = Post::all();
    $data = array('posts' => $posts);
    $this->render('index', $data);
  }
  
  public function showPost()
  {
    $post = Post::find($_GET['id']);
    $data = array('post' => $post);
    $this->render('show', $data);
  }
  
  public function addData()
  {
    $post = Post::addData();
    
    $data = array('post' => $post);
    $this->render('add', $data);
  }
  
  public function deleteData()
  {
    $post = Post::deleteData($_GET['id']);
    $data = array('post' => $post);
    $this->render('delete', $data);
  }
  
  public function editData()
  {
    $post = Post::find($_GET['id']);
    $data = array('post' => $post);
    $this->render('edit', $data);

    if (isset($_POST['editbtn'])) {
      $post1 = Post::editData($_GET['id']);
      $data1 = array('post' => $post1);
      $this->render('edit', $data);
    }
  }
  
}

