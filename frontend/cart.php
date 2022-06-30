<?php
session_start();
if(!isset($_SESSION["invoice_sell_product"]))
$_SESSION["invoice_sell_product"]=[];
//Nếu là thêm vào rỏ hàng
if(isset($_POST["add-cart"]) && $_POST["add-cart"]){
    $ProductID=$_POST["ProductID"];
    $Quantity=$_POST["quantityPick"];
    $ProductName=$_POST["ProductName"];
    $ExportPrice=$_POST["ExportPrice"];
    $CategoryID=$_POST["CategoryID"];
    $ProductImage=$_POST["ProductImage"];
    //Thêm vào session
    $flag=true;
    for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
        if($_SESSION["invoice_sell_product"][$i]["ProductID"]==$ProductID){
            $_SESSION["invoice_sell_product"][$i]["quantityPick"]= (int)( $_SESSION["invoice_sell_product"][$i]["quantityPick"])+$Quantity;
            $flag=false;
        }
    }
    if($flag){
        $productOder=["ProductImage"=>$ProductImage, "ProductID"=>$ProductID,"ExportPrice"=>$ExportPrice,"ProductName"=>$ProductName, "quantityPick"=>$Quantity, "CategoryID"=>$CategoryID];
        $_SESSION["invoice_sell_product"][]=$productOder;
    }
    if($_POST["add-cart"] == "add-cart-index"){
        header("Location: /ntstore/frontend/");
    }else{
        header("Location: /ntstore/frontend/product.php?productID=$ProductID");
    }
}
//Nếu là mua ngay
if(isset($_POST["buy-now"]) ){
    $ProductID=$_POST["ProductID"];
    $Quantity=$_POST["quantityPick"];
    $ProductName=$_POST["ProductName"];
    $ExportPrice=$_POST["ExportPrice"];
    $CategoryID=$_POST["CategoryID"];
    $ProductImage=$_POST["ProductImage"];
    //Thêm vào session
    $flag=true;
    for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
        if($_SESSION["invoice_sell_product"][$i]["ProductID"]==$ProductID){
            $_SESSION["invoice_sell_product"][$i]["quantityPick"]= (int)( $_SESSION["invoice_sell_product"][$i]["quantityPick"])+$Quantity;
            $flag=false;
        }
    }
    if($flag){
        $productOder=["ProductImage"=>$ProductImage, "ProductID"=>$ProductID,"ExportPrice"=>$ExportPrice,"ProductName"=>$ProductName, "quantityPick"=>$Quantity,"CategoryID"=>$CategoryID];
        $_SESSION["invoice_sell_product"][]=$productOder;
    }
}


//hàm kiểm tra xem có trùng sản phẩm không
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NTstore</title>
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="./assest/css/base.css" />
        <link rel="stylesheet" href="./assest/css/main.css" />
        <link rel="stylesheet" href="./assest/css/grid.css" />
        <link rel="stylesheet" href="./assest/css/responsive.css" />
        <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.3-web/css/all.min.css" />
        <link rel="stylesheet" href="./assest/css/product.css" />
    </head>

    <body>
        <div class="main">
            <div class="grid wide">
                <div class="cart-header">
                    <div class="header">
                        <div class="grid wide">

                            <div class="header__navbar hide-on-tablet hide-on-mobile">
                                <ul class="header__navbar-list">
                                    <li class="header__navbar-item header__navbar-item--separate">
                                        Cửa hàng bán linh kiện máy tính NTSTORE
                                    </li>
                                    <li class="header__navbar-item">
                                        <span class="header__navbar-text-connect"> Kết nối </span>
                                        <a href="" class="header__navbar-icon-link header__navbar-icon-fa">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                        <a href="" class="header__navbar-icon-link font-size-16">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="header__navbar-list">
                                    <li class="header__navbar-item header__navbar-item--has-notify">
                                        <a href="" class="header__navbar-item-link">
                                            <i class="far fa-bell"></i>
                                            Thông báo
                                        </a>
                                        <div class="header__navbar-toast">
                                            <div class="header__toast--header">
                                                <h3>Thông báo mới nhận</h3>
                                            </div>
                                            <div class="header__toast--contain">
                                                <ul class="header__toast--body">
                                                    <li class="header__toast--item header__toast--item-view">
                                                        <a href="" class="header__notify-link">
                                                            <img src="./assest/img/toast/flycam.jpeg" alt=""
                                                                class="header__toast-img" />
                                                            <div class="item__body">
                                                                <p class="item__body--title">
                                                                    Xác nhận đã thanh toán
                                                                </p>
                                                                <p class="item__body--decreption">
                                                                    Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                                    Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                                    Việt Nam.
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="header__toast--item header__toast--item-view">
                                                        <a href="" class="header__notify-link">
                                                            <img src="./assest/img/toast/flycam.jpeg" alt=""
                                                                class="header__toast-img" />
                                                            <div class="item__body">
                                                                <p class="item__body--title">
                                                                    Xác nhận đã thanh toán
                                                                </p>
                                                                <p class="item__body--decreption">
                                                                    Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                                    Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                                    Việt Nam.
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="header__toast--item">
                                                        <a href="" class="header__notify-link">
                                                            <img src="./assest/img/toast/flycam.jpeg" alt=""
                                                                class="header__toast-img" />
                                                            <div class="item__body">
                                                                <p class="item__body--title">
                                                                    Xác nhận đã thanh toán
                                                                </p>
                                                                <p class="item__body--decreption">
                                                                    Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                                    Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                                    Việt Nam.
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                    <li class="header__toast--item">
                                                        <a href="" class="header__notify-link">
                                                            <img src="./assest/img/toast/flycam.jpeg" alt=""
                                                                class="header__toast-img" />
                                                            <div class="item__body">
                                                                <p class="item__body--title">
                                                                    Xác nhận đã thanh toán
                                                                </p>
                                                                <p class="item__body--decreption">
                                                                    Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                                    Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                                    Việt Nam.
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="header__toast--footer">
                                                <a href="" class="toast__footer--link">Xem tất cả</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="header__navbar-item">
                                        <a href="" class="header__navbar-item-link">
                                            <i class="far fa-question-circle"></i>
                                            Trợ giúp
                                        </a>
                                    </li>

                                    <li class="header__navbar-item header__navbar-user">
                                        <a class="header__navbar-user-name" href="/ntstore/page/login.php">Đăng nhập
                                            quyền Admin</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- header with search -->
                            <div class="header-with-search">
                                <div class="header__menu-mobile" onclick="myFunction()">
                                    <i class="fas fa-bars header__menu-mobile__icons"></i>
                                    <i class="fas fa-times header-mobile-icons-close header__menu-mobile-hide"></i>
                                </div>
                                <a href="/ntstore/frontend/">
                                    <div class="header__logo">
                                        <img src="../assets/img/ntstore-fe1.jpg" alt="">
                                    </div>
                                </a>
                                <div class="separate"></div>

                                <div class="header__cart">
                                    <div class="cart-title">Giỏ hàng</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart">
                    <div class="cart-content">
                    </div>
                </div>
                <div class="content">
                    <div class="container-item row">
                        <div class="title-product boder-r-4">
                            Sản phẩm
                        </div>
                        <div class="container-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-a-center">STT</th>
                                        <th scope="col" class="text-center text-a-center">Hình ảnh</th>
                                        <th scope="col" class="text-center text-a-center">Linh kiện</th>
                                        <th scope="col" class="text-center text-a-right ">Số lượng</th>
                                        <th scope="col" class="text-center text-a-right ">Đơn giá </th>
                                        <th scope="col" class="text-center text-a-right ">Thành tiền</th>
                                        <th scope="col" class="text-center text-a-center">Xóa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    </tr>
                                    <?php

                                if(isset($_SESSION["invoice_sell_product"])&&(is_array($_SESSION["invoice_sell_product"]))){
                                    for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
                                        $intoMoney=(int)$_SESSION["invoice_sell_product"][$i]["quantityPick"] *(int)$_SESSION["invoice_sell_product"][$i]["ExportPrice"];
                                         echo'
                                                <tr>
                                                    <td scope="col" class="text-right text-a-center">'.($i+1).'</td>
                                                    <td scope="col">
                                                        <div class="product-item__img"
                                                            style="background-image:url(../assets/img/items/'.$_SESSION["invoice_sell_product"][$i]["ProductImage"].')">
                                                        </div>
                                                    </td>
                                                    <td scope="col" class="text-a-center">'.$_SESSION["invoice_sell_product"][$i]["ProductName"].'</td>
                                                    <td scope="col"  class="text-right text-a-right ">'.$_SESSION["invoice_sell_product"][$i]["quantityPick"].'</td>
                                                    <td scope="col"  class="text-right text-a-right ">'.number_format($_SESSION["invoice_sell_product"][$i]["ExportPrice"]).' VND</td>
                                                    <td scope="col"  class="text-right text-a-right ">'.number_format($intoMoney, 0, '', ',').' VND</td>
                                                    <td scope="col" class="text-a-center"><a
                                                    href="/ntstore/function/order/delete-product.php?delProduct='.$i.'">Xóa</a>
                                                    </td>
                                                </tr>
                                         ';
                                    }
                                }
                                ?>
                                    <tr>
                                        <td colspan="6">
                                            <strong>Tổng Tiền</strong>
                                        </td>
                                        <td colspan="2" style="text-align: right ;">
                                            <strong><span id="sumPrice">
                                                    <?php
                                                    if(isset($_SESSION["invoice_sell_product"])&&(is_array($_SESSION["invoice_sell_product"]))){
                                                        $totalPrice=0;
                                                        for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
                                                            $intoMoney=(int)$_SESSION["invoice_sell_product"][$i]["quantityPick"] *(int)$_SESSION["invoice_sell_product"][$i]["ExportPrice"];
                                                            $totalPrice+=$intoMoney;
                                                        }
                                                        echo number_format($totalPrice, 0, '', ',');
                                                    }
                                                    ?>
                                                </span> VND </strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="customer-infor">
                            <div class="container">
                                <div class="form-header">
                                    <div class="text">Thông tin khách hàng</div>
                                </div>
                                <form action="/ntstore/function/order/add-export-product.php" method="POST">
                                    <div class="form-content">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-input">
                                                    <div class="title">Tên khách hàng<span class="color-red">*</span>:
                                                    </div>
                                                    <input type="text" name="CustomerName" id="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-check">
                                                    <div class="title">Giới tính<span class="color-red">*</span>: </div>
                                                    <div class="form-check-wraper">
                                                        <input type="radio" name="Gender" id="male" value=1 checked>
                                                        <label for="male">Nam</label>
                                                        <input type="radio" name="Gender" id="female" value=0><label
                                                            for="female">Nữ</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-input">
                                                    <div class="title">Số điện thoại<span class="color-red">*</span>:
                                                    </div>
                                                    <input type="text" name="PhoneNumber" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-input">
                                                    <div class="title">Ngày sinh: </div>
                                                    <input type="date" name="DateOfBirth" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-input">
                                                    <div class="title">Email<span class="color-red">*</span>: </div>
                                                    <input type="text" name="Email" id="">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-input">
                                                    <div class="title">Địa chỉ<span class="color-red">*</span>: </div>
                                                    <textarea name="Address" id="" cols="30" rows="6"></textarea>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="form-footer">
                                        <a href="/ntstore/function/order/destroy-product.php" type="submit"
                                            name="cancel" value="cancel" class="btn btn-light" id="btnCancel">Hủy bỏ đơn
                                            hàng</a>

                                        <button type="submit" class="btn btn-warning" name="order_confirm"
                                            value="order_confirm">Xác nhận thanh
                                            toán</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        </div>
    </body>
    <style>
    @import url(../style/components/table.css);
    @import url(../style/components/input.css);
    @import url(../style/components/button.css);
    @import url(../style/components/toast.css);
    @import url(../style/components/modal.css);

    .header__logo {
        background-image: url("./assest/img/ntstore-fe.jpg");
        height: 66px;
        width: 196px;
        padding-left: 6px;
        padding-right: 6px;

    }

    .product-item__img {
        padding-top: 60%;
    }

    .item-body__oder-current {
        max-width: 40px;
        padding: 0px;
        text-align: center;
        outline: none;
    }

    .item-body__oder-amount {
        cursor: pointer;
        display: block;
        padding: 5px 10px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        font-size: 1.2em;
    }

    .header__logo img {
        width: 100%;
        height: 100%;
    }

    table tr td {
        vertical-align: middle;
    }

    .separate {
        height: 48px;
        color: #fff;
        background-color: #fff;
        border-left: 1px solid #fff;
    }

    .title-product {
        padding-left: 8px;
    }

    .form-header {
        margin-top: 10px;
        font-size: 20px;
    }

    .container-table {
        margin-top: 10px;
        border-radius: 4px;
        background-color: #fff;
    }

    .header__cart .cart-title {
        font-size: 20px;
        color: #fff;
    }

    .form-footer {
        width: 70%;
        display: flex;
        justify-content: center;
        margin-bottom: 10px;
    }

    .form-footer .btn {
        margin-right: 40px;
    }



    .form-input {
        display: flex;
        max-width: 70%;
        justify-content: space-between;
        margin: 10px 0px;
    }

    .form-check {
        width: 70%;
        display: flex;
        justify-content: space-between;
    }

    .form-check .form-check-wraper {
        width: 70%;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .form-check .form-check-wraper label {
        margin-right: 10px;
    }

    .form-input input {
        width: 70%;
        border: 1px solid #ccc;
        padding: 4px;
        border-radius: 4px;
        outline: none;
    }

    .form-input textarea {
        width: 70%;
        border: 1px solid #ccc;
        padding: 4px;
        border-radius: 4px;
        outline: none;
    }

    .color-red {
        color: red;
    }

    .form-check {
        display: flex;
        padding-left: 0;
    }

    .main {
        font-size: 16px;

        background-color: whitesmoke;
    }

    .table {
        border-left: 1px solid #ccc;
        background-color: #fff;
    }

    .table thead th {
        background-color: whitesmoke;
    }

    .content {
        margin-top: var(--height-header);
        background-color: #fff;
    }

    .container-item {
        background-color: whitesmoke;
    }

    .title-product {
        margin-top: 10px;
        font-size: 20px;
        padding: 10px;
        border-radius: 4px;
    }

    .boder-r-4 {
        background-color: #fff;
        border-radius: 4px;
    }

    .customer-infor {
        margin-top: 10px;
        background-color: #fff;
        margin-bottom: 20px;
        border-radius: 4px;
    }
    </style>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>

</html>