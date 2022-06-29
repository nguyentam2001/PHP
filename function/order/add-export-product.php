<?php
session_start();
require '../../database/connect_db.php';
if(isset($_POST["order_confirm"])&& $_POST["order_confirm"]){
    $CustomerName=$_POST["CustomerName"];
    $Gender=$_POST["Gender"];
    $PhoneNumber=$_POST["PhoneNumber"];
    $DateOfBirth=$_POST["DateOfBirth"];
    $Email=$_POST["Email"];
    $Address=$_POST["Address"];

   
    $db=new Database();
    $db->connect_db();//kết nối database

    //kiểm tra xem số điện thoại của khách hàng có trong csdl chưa
    //Lấy date hiện tại
    $date = date("Y-m-d");

    $query="SELECT CustomerID FROM customer WHERE PhoneNumber=$PhoneNumber";
    $result=mysqli_query($db->conn,$query);
    $row = mysqli_fetch_assoc($result);
    $customerID = $row["CustomerID"];
    $data=mysqli_query( $db->conn,$query);
    if(!$data->num_rows){
        $query="INSERT INTO customer VALUES (0,'KH01','$Address','$PhoneNumber','$Email','$Gender','$DateOfBirth','$CustomerName')";
        $data = mysqli_query($db->conn,$query);
        $customerID = mysqli_insert_id($db->conn);
    }
   //Thêm vào hóa đơn chi tiết
   $query="INSERT INTO export_invoice VALUES (0,'Hóa đơn mua hàng','$date','$customerID ','5')";
   $result=mysqli_query($db->conn,$query);
   $InvoiceID = mysqli_insert_id($db->conn);
  //Thêm thông tin vào bảng hóa đơn bán - sản phẩm
  for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
    $TotalExport= $_SESSION["invoice_sell_product"][$i]["quantityPick"];
    $PriceExport= $_SESSION["invoice_sell_product"][$i]["ExportPrice"];
    $ProductID=$_SESSION["invoice_sell_product"][$i]["ProductID"];
    $query="INSERT INTO export_invoice_product VALUES ('$InvoiceID','$ProductID','$TotalExport','$PriceExport')";
    $result=mysqli_query($db->conn,$query);
  }   
  session_destroy();
  header("Location:/ntstore/frontend/");
 
}
?>