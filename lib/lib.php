<?php
require "./database/connect_db.php";

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


function getTotal($tableName,$propName)
{
   
    $database=new Database();
    $database->connect_db();//kết nối database
    $query=" SELECT MAX(InvoiceID) as MaxID FROM import_invoice";
    $result=mysqli_query($database->conn,$query);
    $row = mysqli_fetch_assoc($result);
    $InvoiceID=$row["MaxID"] +1;
    $database->close_db();//ngắt kết nối database
    return $InvoiceID;
}

?>