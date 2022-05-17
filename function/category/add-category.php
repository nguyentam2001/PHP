<?php

require '../../utilities/check-error.php';
require '../../database/connect_db.php';

$CategoryID = $CategoryName = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if( !empty($_POST["CategoryID"])){
        $CategoryID = $_POST["CategoryID"];
    }

    if( !empty($_POST["CategoryName"])){
        $CategoryName = $_POST["CategoryName"];
    }

    $dataBase = new Database();
     $dataBase -> connect_db();

     $query = "INSERT INTO Category (CategoryID, CategoryName) VALUES ('" .$CategoryID. "','".$CategoryName."')";

     $data = mysqli_query($dataBase->conn,$query);
    if($data == TRUE){
        echo json_encode(array("data"=>"Success"));
    }
    $dataBase->close_db();
}