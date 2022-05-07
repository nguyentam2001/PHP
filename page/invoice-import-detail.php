<?php
session_start();
var_dump($_SESSION["invoice_import_product"]);
 require '../utilities/check-error.php';
 require '../database/connect_db.php';
 $query = "SELECT ManufactureID, ManufactureName from manufacture";
function fill_data_category($query){
    $db = new Database();
    $db->connect_db(); //kết nối database
    $data = $db->getData($query);
    $db->close_db();
    if(count($data)>0){
        for($i=0;$i<count($data);$i++){
            echo'
            <option value='.$data[$i]['CategoryID'].'>'.$data[$i]['CategoryName'].' </option>
            ';
        }
    }
}


function showProductInvoice(){
    if(isset($_SESSION["invoice_import_product"])&&(is_array($_SESSION["invoice_import_product"]))){
        $db = new Database();
        $db->connect_db(); //kết nối database
        for($i=0;$i<sizeof($_SESSION["invoice_import_product"]);$i++){
                echo'
                    <tr>
                        <td scope="col">'.($i+1).'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["CategoryName"].'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["ProductName"].'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["TotalImport"].'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["PriceImport"].'</td>
                    </tr>
                ';
        }
        $db->close_db();
    }
}

?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style/main.css">
        <link rel="shortcut icon" href="../assets/img/logo-tab.jpg" />
        <title>Document</title>
    </head>

    <body>
        <div class="display-form">
            <div class="form-wraper">
                <div id="invoiceImport">
                    <div class="container">
                        <div class="form-header justify-center">
                            <div class="text">Hóa đơn nhập hàng</div>
                        </div>
                        <div class="form-content">
                            <div class="row">
                                <div class="col-6 ">
                                </div>
                                <div class="col">
                                    <div class="form-input flex-center justify-end">
                                        <div class="title m-r-24">Ngày nhập: </div>
                                        <input class="flex-1 m-w-200" type="date" name="DateOfBirth" id="">
                                    </div>
                                    <div class="form-input flex-center justify-end">
                                        <div class="title m-r-24">Số hóa đơn: </div>
                                        <input class="flex-1 m-w-200" type="text" name="DateOfBirth" id="">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="horizontal-line"></div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-input flex-center ">
                                        <div class="title">Nhà cung cấp: </div>
                                        <select id="manufactureSelect" class="flex-1 max-w-220" id="cars">
                                            <?php
                                             $db = new Database();
                                             $db->connect_db(); //kết nối database
                                             $query = "SELECT ManufactureID, ManufactureName from manufacture";
                                             $data = $db->getData($query);
                                             $db->close_db();
                                             if(count($data)>0){
                                                for($i=0;$i<count($data);$i++){
                                                    echo'
                                                    <option value='.$data[$i]['ManufactureID'].'>'.$data[$i]['ManufactureName'].' </option>
                                                    ';
                                                }
                                             }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-input flex-center  ">
                                        <div class="title">Địa chỉ: </div>
                                        <div class="address">Tu Hoàng, Phường Phương Canh, Quận Nam từ liêm, Hà Nội
                                        </div>
                                    </div>
                                    <div class="form-input flex-center ">
                                        <div class="title">Số điện thoai:</div>
                                        <div class="phone">0337900678</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="horizontal-line"></div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-input flex-center ">
                                        <div class="title">Bên mua: </div>
                                        <div>CỬA HÀNG BÁN LINH KIỆN MÁY TÍNH NTSTORE</div>
                                    </div>
                                    <div class="form-input flex-center  ">
                                        <div class="title">Địa chỉ: </div>
                                        <div>Tu Hoàng, Phường Phương Canh, Quận Nam từ liêm, Hà Nội</div>
                                    </div>
                                    <div class="form-input flex-center ">
                                        <div class="title">Số điện thoai:</div>
                                        <div>03376966780</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Danh mục</th>
                                            <th scope="col">Linh kiện</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Đơn giá nhập</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php
                                            showProductInvoice();
                                            ?>
                                        </tr>
                                        <form action="http://localhost/ntstore/function/invoice/add-product-invoice.php"
                                            method="POST">
                                            <tr>
                                                <td scope="col">
                                                    <input type="submit" class="btn btn-warning" id="btnAdd"
                                                        value="+ Thêm" name="addProductInvoice" />
                                                </td>
                                                <td scope="col">
                                                    <select id="categorySelect" class="flex-1 max-w-220"
                                                        name="CategorySelected">
                                                        <?php
                                                        $query = "SELECT CategoryID, CategoryName from category";
                                                        fill_data_category( $query);
                                                        ?>
                                                    </select>
                                                </td>
                                                <td scope="col">
                                                    <select id="productSelect" class="flex-1 " name="ProductSelected">
                                                    </select>
                                                </td>
                                                <td scope="col">
                                                    <div class="form-input m-t-0">
                                                        <input class="flex-1 " type="number" name="TotalImport"
                                                            placeholder="Nhập số lượng">
                                                    </div>
                                                </td>
                                                <td scope="col">
                                                    <div class="form-input m-t-0">
                                                        <input class="flex-1 " type="number" name="PriceImport"
                                                            placeholder="Nhập đơn giá">
                                                    </div>
                                                </td>
                                            </tr>
                                        </form>

                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-light" id="btnCancel">Hủy bỏ</button>
                            <button type="button" class="btn btn-warning" id="btnConfirm"> Đồng ý</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../lib/bootstrap/js/bootstrap.js"></script>
        <script src="../lib/jquery/jquery.js"></script>
        <script type="text/javascript" src="../script/invoice-import-detail.js"></script>
    </body>
    <style>
    @import url(../style/page/customer-detail.css);
    @import url(../style/components/select.css);

    .form-wraper {
        position: fixed;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        z-index: 2;
        background-color: #00000072;
        display: flex;
        align-items: center;
        justify-content: center;

    }

    .display-form {
        display: block;
    }

    .horizontal-line {
        height: 24px;
        border-top: 1px solid #ccc;
        margin-top: 24px;
    }



    #invoiceImport .title {
        min-width: 120px;
        text-align: left;
    }

    #invoiceImport {
        border-radius: 0px;
        width: 100%;
        background-color: white;
        padding: 24px;
        height: 100vh;
        overflow-y: scroll;
    }

    #invoiceImport .form-header {
        margin-top: 12px;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 24px;
    }

    #invoiceImport .form-input {
        width: 100%;
        margin-top: 12px;
    }

    #invoiceImport .form-input input {
        width: 100%;
        height: 34px;
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 0 16px;
        /* outline: thin; */
        outline-color: red;
    }

    #invoiceImport .form-check {
        width: 100%;
        margin-top: 12px;
    }

    #invoiceImport .form-input .title {
        margin-bottom: 8px;
    }

    #invoiceImport .form-check .title {
        margin-bottom: 8px;
    }

    #invoiceImport .form-check .form-check-wraper {
        height: 34px;
        display: flex;
        align-items: center;
    }

    #invoiceImport .form-check-wraper label {
        margin-right: 12px;
        margin-left: 6px;
    }

    #invoiceImport .form-footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    </style>

</html>