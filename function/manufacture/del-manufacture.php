<?php
$ManufactureID=$_POST["id"];
require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
$database=new Database();
$database->connect_db();//kết nối database
//Thực hiện câu lệnh truy vấn
$query="DELETE FROM Manufacture WHERE ManufactureID=$ManufactureID ";
  if(mysqli_query($database->conn,$query)){
      echo json_encode(array("data"=>"Success"));
  }else{
    echo json_encode(array("data"=>"Error"));
  }
$database->close_db();//ngắt kết nối database
?>