<?php
$CustomerID=$_POST["id"];
require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
$database=new Database();
$database->connect_db();//kết nối database
//Thực hiện câu lệnh truy vấn
$query="DELETE FROM Customer WHERE CustomerID=$CustomerID ";
$data= mysqli_query($database->conn,$query);
  if($data==TRUE){
      echo json_encode(array("data"=>"Success"));
  }
$database->close_db();//ngắt kết nối database
?>