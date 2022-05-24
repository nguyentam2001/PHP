<?php
require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
session_start();
if(isset($_GET["get-invoice-import"])&&$_GET["get-invoice-import"]){
    $InvoiceID=$_GET["get-invoice-import"];
    $_SESSION["CurrentInvoiceID"]= $InvoiceID;
    //Lấy thông tin hóa đơn nhập
    getInvoiceImport($InvoiceID);
    //lấy tất cả sản phẩm có liên kết với hóa đơn nhập
    getInforProductInvoiceImport($InvoiceID);
    header("Location:/ntstore/page/invoice-import-detail.php");
}

function getInvoiceImport( $InvoiceID)
{
    $db=new Database();
    $db->connect_db();
    $qr="SELECT DateCreate,ManufactureID,EmployeeID FROM import_invoice where InvoiceID=$InvoiceID";
    $result=mysqli_query($db->conn,$qr);
    $row = mysqli_fetch_assoc($result);
    $_SESSION["invoiceImportDate"]= $row["DateCreate"];
    $_SESSION["invoiceImportManufacture"]=$row["ManufactureID"];
    $_SESSION["invoiceImportEmployee"]=$row["EmployeeID"];

    $db->close_db();
}

function getInforProductInvoiceImport($InvoiceID)
{
    $db=new Database();
    $db->connect_db();
    $qr="SELECT c.CategoryID,CategoryName,iip.ProductID,ProductName,TotalImport,PriceImport 
    FROM import_invoice ii 
    INNER JOIN import_invoice_product iip ON ii.InvoiceID = iip.InvoiceID 
    INNER JOIN product p ON iip.ProductID = p.ProductID 
    INNER JOIN category c ON p.CategoryID = c.CategoryID WHERE ii.InvoiceID=$InvoiceID GROUP BY c.CategoryID,iip.ProductID";
    $result=mysqli_query($db->conn,$qr);
    //Kiểm tra xem có tồn trại session không
   
    $_SESSION["invoice_import_product"]=[];
    while($row=mysqli_fetch_array($result)){
            $ProductOder=["CategoryName"=>$row["CategoryName"], "CategoryID"=>$row["CategoryID"],"ProductName"=> $row["ProductName"], "ProductID"=>$row["ProductID"], "TotalImport"=>$row["TotalImport"], "PriceImport"=>$row["PriceImport"]];
            $_SESSION["invoice_import_product"][]=$ProductOder;
    }
}

?>