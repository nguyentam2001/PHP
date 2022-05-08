<?php
class Database {
  // Properties
 private $servername;
 private $username;
 private $password;
 private $databaseName;
 public $conn;
  // Methods
  function __construct()
  {
      $this->servername="localhost";
      $this ->username="root";
      $this -> password="tam060601";
      $this->databaseName="ntstore";
  }

 function connect_db() {
   // Create connection
        $this->conn = new mysqli( $this->servername, $this ->username, $this ->password,$this->databaseName);
        // Check connection
        mysqli_set_charset($this->conn,"utf8");
        if ( $this->conn->connect_error) {
        die("Connection failed: " .  $this->conn->connect_error);
     }
  }
  function getData($query){
    $result=mysqli_query($this->conn,$query);
    $data=array();
    while($row = mysqli_fetch_array($result,1)){
      $data[]=$row;
    };
    return $data;
  }
  //ngắt kết lối db
  function close_db() {
    $this->conn->close();
  }
}