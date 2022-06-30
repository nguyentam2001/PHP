<?php
$CategoryID = $_POST["id"];

require '../../database/connect_db.php';

$dataBase = new Database();
$dataBase->connect_db();
if ($CategoryID != 1) {
    $product = "SELECT * FROM product WHERE CategoryID = $CategoryID";
    $data = mysqli_query($dataBase->conn, $product);
    $row = mysqli_fetch_array($data);
    while ($row) :
        $productID = $row['ProductID'];
        $updateCate = "UPDATE product SET CategoryID = '1' WHERE ProductID = $productID";
        mysqli_query($dataBase->conn, $updateCate);

    endwhile;
    $query = "DELETE FROM category WHERE CategoryID = $CategoryID";
    $data1 = mysqli_query($dataBase->conn, $query);
    if ($data1 == TRUE) {
        echo json_encode(array("data1" => "Success"));
    }
} else {
    
}
$dataBase->close_db();
?>