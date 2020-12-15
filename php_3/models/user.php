<?php
class User
{
  public $id;
  public $title;
  public $image;

  function __construct($id, $title, $image)
  {
    $this->id = $id;
    $this->title = $title;
    $this->image = $image;
  }

  static function sitelist()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM data');

    foreach ($req->fetchAll() as $item) {
      $list[] = new User($item['id'], $item['title'], $item['image']);
    }

    return $list;
  }

  static function find($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('SELECT * FROM data WHERE id = :id');
    $req->execute(array('id' => $id));

    $item = $req->fetch();
    if (isset($item['id'])) {
      return new User($item['title'], $item['description'], $item['image']);
    }
    return null;
  }

}