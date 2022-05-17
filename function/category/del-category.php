<?php
$CategoryID = $_POST["id"];

require '../../database/connect_db.php';

$dataBase = new Database();
$dataBase->connect_db();
$query = "DELETE FROM Category WHERE CategoryID = $CategoryID";
$data = mysqli_query($dataBase->conn,$query);
if($data ==TRUE){
    echo json_encode(array("data"=>"Success"));

}

$dataBase->close_db();

?>