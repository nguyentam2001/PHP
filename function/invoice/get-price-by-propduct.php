<?php
   require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
   $database=new Database();
   $database->connect_db();//kết nối database
if(isset($_POST["ProductID"])&&$_POST["ProductID"]){
    //Lấy giá tiền bởi sản phẩm
    $output="";
    $ProductID=$_POST["ProductID"];
    $qr="SELECT ImportPrice FROM product where ProductID=$ProductID";
    $result=mysqli_query($database->conn,$qr);
    $row=mysqli_fetch_assoc($result);
    $output=$row["ImportPrice"];
    echo $output;
    $database->close_db();//ngắt kết nối database
}
?>