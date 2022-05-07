<?php
session_start();
    if(!isset($_SESSION["invoice_import_product"]))
    $_SESSION["invoice_import_product"]=[];
    require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
   
   
    function getNameByID($TableName,$SelectName,$IDName,$CategoryID){
        $database=new Database();
        $database->connect_db();//kết nối database
        $query="SELECT $SelectName From $TableName where $IDName=$CategoryID";
        $data=mysqli_query( $database->conn,$query);
        $output="";
        while($row=mysqli_fetch_array($data)){
            $output = $row[0];
        }
         $database->close_db();//ngắt kết nối database
        return $output;
       
    }
    if(isset($_POST["addProductInvoice"])&&$_POST["addProductInvoice"]&&$_SERVER["REQUEST_METHOD"] == "POST"){
        $CategoryID=$_POST["CategorySelected"];
        //get category name;
        $CategoryName=getNameByID("category","CategoryName","CategoryID",$CategoryID);
        $ProductID=$_POST["ProductSelected"];
        $ProductName= getNameByID("product","ProductName","ProductID",$ProductID);
        $TotalImport=$_POST["TotalImport"];
        $PriceImport=$_POST["PriceImport"];
        $ProductOder=["CategoryName"=>$CategoryName, "CategoryID"=>$CategoryID,"ProductName"=> $ProductName, "ProductID"=>$ProductID, "TotalImport"=>$TotalImport, "PriceImport"=>$PriceImport];
        $_SESSION["invoice_import_product"][]=$ProductOder;
        header('Location: http://localhost/ntstore/page/invoice-import-detail.php');
    }
  
    ?>