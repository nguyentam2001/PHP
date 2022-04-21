<?php
 require '../../utilities/check-error.php';    
 require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $ManufactureID=$_POST["id"];
    $ManufactureCode=$_POST["ManufactureCode"];
    $ManufactureName=$_POST["ManufactureName"];
    $PhoneNumber=$_POST["PhoneNumber"];
    $Address=$_POST["Address"];
    $db=new Database();
    $db->connect_db();
     //Thực hiện câu lệnh truy vấn
    $qr="UPDATE manufacture SET ManufactureCode='".$ManufactureCode."', Address='".$Address."', PhoneNumber='".$PhoneNumber."', ManufactureName='".$ManufactureName."' WHERE ManufactureID=$ManufactureID";
    $data=mysqli_query($db->conn,$qr);
    if($data==TRUE){
        echo json_encode(array("data"=>"Success"));
    }
};
?>