<?php
session_start();
include "./invoice-func.php";
if(isset($_GET["delProduct"]) && $_GET["delProduct"]!=null){
    $index=$_GET["delProduct"];
    //Xóa một sản phẩm trong hóa đơn nhập đang lưu trong session
    deleteProducByIndex($index);
    //Xóa sản phẩm trong hóa đơn by ID
    if(sizeof($_SESSION["invoice_sell_product"])==0){
        header("Location:/ntstore/frontend/");
    }else{
        header("Location:/ntstore/frontend/cart.php");
    }
}
function deleteProducByIndex($index)
{
    array_splice($_SESSION["invoice_sell_product"],$index,1);
}
?>