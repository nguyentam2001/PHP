<?php
require '../../database/connect_db.php';
$dataBase = new Database();
$dataBase->connect_db();
$sql = "SELECT Max(CategoryID) as MAX from category";
$result=mysqli_query($dataBase->conn,$sql);
$row=mysqli_fetch_assoc($result);
$newCategoryID=(int)($row["MAX"])+1;
$dataBase->close_db();//ngắt kết nối database
echo json_encode($newCategoryID);
?>