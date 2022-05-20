<?php
$ProductID=$_POST["id"];

require '../../database/connect_db.php';

$dataBase = new Database();
$dataBase->connect_db();

$sql = "SELECT * FROM product WHERE ProductID = $ProductID";

$data = $dataBase->getData($sql);

if($data == TRUE){
    echo json_encode($data);
}

$dataBase->close_db();
?>