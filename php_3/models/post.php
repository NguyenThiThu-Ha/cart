 <?php
class Post
{
  public $id;
  public $title;
  public $description;
  public $image;
  public $status;
  public $create_at;
  public $update_at;

  function __construct($id, $title, $description, $image, $status, $create_at, $update_at)
  {
    $this->id = $id;
    $this->title = $title;
    $this->description = $description;
    $this->image = $image;
    $this->status = $status;
    $this->create_at = $create_at;
    $this->update_at = $update_at;
  }

  static function all()
  {
    $list = [];
    $db = DB::getInstance();
    $req = $db->query('SELECT * FROM data');

    foreach ($req->fetchAll() as $item) {
      $list[] = new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
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
      return new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
    }
    return null;
  }

  static function deleteData($id)
  {
    $db = DB::getInstance();
    $req = $db->prepare('DELETE FROM data WHERE id = :id');
    $req->execute(array('id' => $id));
    
    $item = $req->fetch();
    if (isset($item['id'])) {
      return new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
    }
    return null;
  }

  static function addData()
  {
//     $db = DB::getInstance();
////     $req = $db->prepare('INSERT INTO data (title, description, image, status) VALUES (title = :title, description = :description, image = :image, status = :status)');
////    $req->execute(array(':title' => $title, ':description' => $description, ':image' => $image, ':status' => $status));
//    
//    $item = $req->fetch();
//     if (isset($_POST["submitbtn"])) {
//      $title = $_POST["title"];
//      $description = $_POST["description"];
//      $image = $_POST["image_upload"];
//      $status = $_POST["status"];
//      
//      $req1 = $db->prepare('INSERT INTO data (title, description, image, status,create_at, update_at) VALUES (title = :title, description = :description, image = :image, status = :status,null,null)');
//      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
//       $req1->execute(array(':title' => $title, ':description' => $description, ':image' => $image, ':status' => $status));
//
//      if ($req1->execute()) {
//        echo "Update Successfully";
//      } else echo "Error";
      
      if (isset($_POST["submitbtn"])){
      
      $title = $_POST["title"];
      $description = $_POST["description"];
      $image = $_POST["image_upload"];
      //upload image to DB
      //$filename = $_FILES['image']['name']; 
      // $filetmpname = $_FILES['image']['tmp_name'];
      // $folder = 'photo/';
      // move_uploaded_file($filetmpname, $folder.$filename);
      $status = $_POST["status"];

      $db = DB::getInstance();
      $req = $db->prepare('INSERT INTO data (title, description, image, status) VALUES (:title, :description, :image, :status)');
      if ($req->execute(array(':title' => $title, ':description' => $description, ':image' => $image, ':status' => $status))) {
        echo "Success";
      }else echo "Error";
      
       
 return null;
    }
   
  
  }
  static function editData($id)
  {
    

    // $req = $db->prepare('SELECT * FROM exercisephp WHERE id = :id');
    // $req->execute(array('id' => $id));

    // $item = $req->fetch();


    // if (isset($item['id'])) {
    //   return new Post($item['id'], $item['title'], $item['description'], $item['image'], $item['status'], $item['create_at'], $item['update_at']);
    // }

    
    if (isset($_POST["editbtn"])) {
        $id =$_REQUEST['id'];
      $title = $_POST["title"];
      $description = $_POST["description"];
      $image = $_POST["image_upload"];
      $status = $_POST["status"];
      $db = DB::getInstance();
      $req = $db->prepare('UPDATE data SET title = :title, description = :description, image = :image, status = :status WHERE id = :id');
//      $db->setAttribute( PDO::ATTR_ERRMODEs, PDO::ERRMODE_WARNING );
      if ($req->execute(array(':title' => $title, ':description' => $description, ':image' => $image, ':status' => $status, ':id' => $id))) {
          
          echo "success";
      }else echo "Error";
//      $req1->execute(array(':title' => $title, ':description' => $description, ':image' => $image, ':status' => $status, ':id' => $id));
//
//      if ($req1->execute()) {
//        echo "Update Successfully";
//      } else echo "Error";
      return null;
    }
    
  }
}