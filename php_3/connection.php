<?php

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE php4";
    // use exec() because no results are returned
    $conn->exec($sql);
//    echo "Database created successfully<br>";
    try {
        // sql to create table
        $sql = "CREATE TABLE php4.data (
      id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(100) NULL ,
    `description` TEXT NULL ,
    `image` VARCHAR(200) NULL ,
    `status` TEXT NULL ,
    `create_at` DATETIME NULL ,
    `update_at` DATETIME NULL
      )";

        // use exec() because no results are returned
    $conn->exec($sql);
//    echo " successfully";
        
    } catch (PDOException $e) {
//        echo $sql . "<br>" . $e->getMessage();
    }
} catch (PDOException $e) {
//    echo $sql . "<br>" . $e->getMessage();
}
class DB
{
    private static $instance = NULl;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          self::$instance = new PDO('mysql:host=127.0.0.1;dbname=php3', 'root', '');
          self::$instance->exec("SET NAMES 'utf8'");
        } catch (PDOException $ex) {
          die($ex->getMessage());
        }
      }
      return self::$instance;
    }
}

