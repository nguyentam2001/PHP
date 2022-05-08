<?php

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


?>