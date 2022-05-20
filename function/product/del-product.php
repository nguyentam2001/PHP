<?php

$ProductID = $_POST["id"];
require '../../database/connect_db.php';
$dataBase = new Database();
$dataBase->connect_db();

$sql = "DELETE FROM product WHERE ProductID = $ProductID";
$data = mysqli_query($dataBase->conn,$sql);

if($data == TRUE){
    echo json_encode(array("data"=>"Success"));
}

$dataBase->connect_db();

?>