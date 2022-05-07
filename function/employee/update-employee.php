<?php
 require '../../utilities/check-error.php';    
 require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $EmployeeID=$_POST["id"];
    $EmployeeCode=$_POST["EmployeeCode"];
    $EmployeeName=$_POST["EmployeeName"];
    $AccoutName=$_POST["AccoutName"];
    $Position=$_POST["Position"];
    $Password=$_POST["Password"];
    $Email=$_POST["Email"];
    $Gender=$_POST["Gender"];
    $db=new Database();
    $db->connect_db();
     //Thực hiện câu lệnh truy vấn
    $qr="UPDATE employee SET EmployeeCode='".$EmployeeCode."', EmployeeName='".$EmployeeName."', AccoutName='".$AccoutName."', Position='".$Position."', Password='".$Password."', Gender='".$Gender."', Email='".$Email."' WHERE EmployeeID=$EmployeeID";
    $data=mysqli_query($db->conn,$qr);
    if($data==TRUE){
        echo json_encode(array("data"=>"Success"));
    }
};
?>