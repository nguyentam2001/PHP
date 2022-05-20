<?php
   require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
   $database=new Database();
   $database->connect_db();//kết nối database
if(isset($_POST["CategoryID"])){
    $output="'<option value=''>-- Chọn linh kiện --</option>'";
    $CategoryID=$_POST["CategoryID"];
    if($_POST["CategoryID"]!=""){
    //Thực hiện câu lệnh truy vấn
        $query="SELECT * FROM product WHERE CategoryID=$CategoryID";
    }else{
        $query="SELECT * FROM product";
    };
        $data=mysqli_query( $database->conn,$query);
        while($row=mysqli_fetch_array($data)){
            $output .= '<option value='.$row['ProductID'].'>'.$row['ProductName'].' </option>';
        }
        echo $output;
    $database->close_db();//ngắt kết nối database
}
?>