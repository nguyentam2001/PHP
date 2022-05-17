<?php

require '../../database/connect_db.php';

$dataBase = new Database();
$dataBase->connect_db();

$sql = "SELECT Max(ProductID) as max from product";


$data = $dataBase->getData($sql);
if($data == TRUE){
    $total = (int)($data[0]["max"])+1;
    if((int)$total<10){
        $total = "0$total";
    }

    echo json_encode("KH$total");
}
$database->close_db();//ngắt kết nối database
