<?php

function getInvoiceNumber(){
    $database=new Database();
    $database->connect_db();//kết nối database
    $query=" SELECT MAX(InvoiceID) as MaxID FROM import_invoice";
    $result=mysqli_query($database->conn,$query);
    $row = mysqli_fetch_assoc($result);
    $InvoiceID=$row["MaxID"] +1;
    $database->close_db();//ngắt kết nối database
    return $InvoiceID;
}
function deleteProducByIndex($index)
{
    array_splice($_SESSION["invoice_import_product"],$index,1);
}

function insertImportInvoice($InvoiceName,$DateCreate,$EmployeeID,$ManufactureID){
    $database=new Database();
    $database->connect_db();//kết nối database
    $query="INSERT INTO import_invoice VALUES(0,'$InvoiceName','$DateCreate','$EmployeeID','$ManufactureID')";
    mysqli_query($database->conn,$query);
    $lastId = mysqli_insert_id($database->conn);
    $database->close_db();//ngắt kết nối database
    return  $lastId;
}
function insertImportInvoiceProduct($InvoiceID,$ProductID,$PriceImport,$ManufactureID)
{
    $database=new Database();
    $database->connect_db();//kết nối database
    $query="INSERT INTO import_invoice_product VALUES('$InvoiceID','$ProductID','$PriceImport','$ManufactureID')";
    mysqli_query($database->conn,$query);
    $database->close_db();//ngắt kết nối database
}
?>