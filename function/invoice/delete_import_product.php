<?php
session_start();
include "./invoice-func.php";
if(isset($_GET["delProduct"]) && $_GET["delProduct"]!=null){
    $index=$_GET["delProduct"];
    deleteProducByIndex($index);
    header("Location:/ntstore/page/invoice-import-detail.php");
}

?>