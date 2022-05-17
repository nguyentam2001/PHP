<?php
require_once "../database/connect_db.php";

function getTotalPrice($sessionName)
{
    if(isset($_SESSION[$sessionName])&&(is_array($_SESSION[$sessionName]))){
        $totalPrice=0;
        for($i=0;$i<sizeof($_SESSION[$sessionName]);$i++){
            $totalPrice+=(int)$_SESSION[$sessionName][$i]["TotalImport"]*(int)$_SESSION[$sessionName][$i]["PriceImport"];
        }
        return  $totalPrice;
    }
}

//Đếm tổng số bản ghi theo id
function getTotal($propName,$tableName,$key)
{
   
    $database=new Database();
    $database->connect_db();//kết nối database
    $query="";
    switch ($key) {
        case 'count':
            $query=" SELECT COUNT($propName) as 'quality' FROM $tableName";
            break;
            case 'sum':
            $query=" SELECT SUM($propName) as 'quality' FROM $tableName";
            break;
        default:
           return 0;
    }
    $result=mysqli_query($database->conn,$query);
    $row = mysqli_fetch_assoc($result);
    $InvoiceID=$row["quality"];
    $database->close_db();//ngắt kết nối database
    return $InvoiceID;
}

?>