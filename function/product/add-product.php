<?php
require "../../database/connect_db.php";
$ProductID = $ProductName = $ExportPrice = $ImportPrice = $CategoryID = $Description = $Quality = $Image = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["ProductName"])) {
        $ProductName = $_POST["ProductName"];
    }
    if (!empty($_POST["ExportPrice"])) {
        $ExportPrice = $_POST["ExportPrice"];
    }
    if (!empty($_POST["ImportPrice"])) {
        $ImportPrice = $_POST["ImportPrice"];
    }
    if (!empty($_POST["CategoryID"])) {
        $CategoryID = $_POST["CategoryID"];
    }
    if (!empty($_POST["Description"])) {
        $Description = $_POST["Description"];
    }
    if (!empty($_POST["Image"])) {
        //Lấy file ảnh
        $Image = $_POST["Image"];
    }
    $dataBase = new Database();

    $dataBase->connect_db();

    $sql = "INSERT INTO product (ProductID, ProductName, ExportPrice, ImportPrice, CategoryID, Description, Quality, Image ) VALUES(0,'" . $ProductName . "','" . $ExportPrice . "','" . $ImportPrice . "','" . $CategoryID . "','" . $Description . "',0,'" . $Image . "')";

    $data = mysqli_query($dataBase->conn, $sql);

    if ($data == TRUE) {
        echo json_encode(array("data" => "Success"));
    }

    $dataBase->close_db();
}