<?php
session_start();
 require '../database/connect_db.php';
 require '../function/invoice/invoice-func.php';
 require '../lib/lib.php';
 $query = "SELECT ManufactureID, ManufactureName from manufacture";
 
function fillOptionSelect($query,$value,$name,$valueSession){
    $db = new Database();
    $db->connect_db(); //kết nối database
    $data = $db->getData($query);
    $db->close_db();
    
    if(count($data)>0){
        for($i=0;$i<count($data);$i++){
            $selected=$data[$i][$value]==$valueSession?' selected':'';
            echo'
            <option value='.$data[$i][$value].' '.$selected.'>'.$data[$i][$name].' </option>
            ';
        }
    }
}


function productsFirstCategoryID(){
    $output="";
    $db = new Database();
    $db->connect_db(); //kết nối database
    $query = "SELECT CategoryID from category";
    $data = $db->getData($query);
    $firstCategoryID=0;
    if(count($data)>0){
        $firstCategoryID=$data[0]['CategoryID'];
    }
        //Thực hiện câu lệnh truy vấn lấy danh sách sản phẩm by category id
            $query="SELECT * FROM product WHERE CategoryID=$firstCategoryID";
            $data=mysqli_query( $db->conn,$query);
            while($row=mysqli_fetch_array($data)){
                $output .= '<option value='.$row['ProductID'].'>'.$row['ProductName'].' </option>';
            }
            echo $output;
    $db->close_db();
}

function showProductInvoice(){
    if(isset($_SESSION["invoice_import_product"])&&(is_array($_SESSION["invoice_import_product"]))){
        for($i=0;$i<sizeof($_SESSION["invoice_import_product"]);$i++){
          $intoMoney=(int)$_SESSION["invoice_import_product"][$i]["TotalImport"]*(int)$_SESSION["invoice_import_product"][$i]["PriceImport"];
                echo'
                    <tr>
                        <td scope="col" class="text-right">'.($i+1).'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["CategoryName"].'</td>
                        <td scope="col">'.$_SESSION["invoice_import_product"][$i]["ProductName"].'</td>
                        <td scope="col"  class="text-right">'.$_SESSION["invoice_import_product"][$i]["TotalImport"].'</td>
                        <td scope="col"  class="text-right">'.number_format($_SESSION["invoice_import_product"][$i]["PriceImport"]).' VND</td>
                        <td scope="col"  class="text-right">'.number_format($intoMoney, 0, '', ',').' VND</td>
                        <td scope="col"'.($_GET["invoice-import"]=="add"?"":"style='display:none'").' ><a href="/ntstore/function/invoice/delete_import_product.php?delProduct='.$i.'">Xóa</a> </td>
                    </tr>
                ';
        }
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
                    <!-- form here -->
                    <form action="/ntstore/function/invoice/add-product-invoice.php" method="POST">
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
                                            <input class="flex-1 m-w-200" type="date" name="DateCreate" id=""
                                                value="<?php echo $_SESSION["invoiceImportDate"]?$_SESSION["invoiceImportDate"]:'2022-12-12'?>">
                                        </div>
                                        <div class="form-input flex-center justify-end">
                                            <div class="title m-r-24">Số hóa đơn: </div>
                                            <input class="flex-1 m-w-200" type="text" name="InvoiceID" value=<?php
                                            //Nếu khác trạng thái add thì lấy số hóa đơn của hóa đơn hiện tại
                                                 if(!isset($_GET["invoice-import"])&&!($_GET["invoice-import"]=="add")){
                                                    echo $_SESSION["CurrentInvoiceID"];
                                                }else{

                                            //Lấy số hóa đơn mới
                                                     echo getInvoiceNumber();
                                                }
                                               
                                                ?>>
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
                                            <select id="manufactureSelect" name="ManufactureSelelted"
                                                class="flex-1 max-w-220" id="cars">
                                                <?php
                                             $db = new Database();
                                             $db->connect_db(); //kết nối database
                                             $query = "SELECT ManufactureID, ManufactureName from manufacture";
                                             $data = $db->getData($query);
                                             $db->close_db();
                                             if(count($data)>0){
                                                for($i=0;$i<count($data);$i++){
                                                    $selected=$data[$i]['ManufactureID']==$_SESSION['invoiceImportManufacture']?' selected':'';
                                                    echo'
                                                    <option value='.$data[$i]['ManufactureID'].''.$selected.'>'.$data[$i]['ManufactureName'].' </option>
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
                                        <div class="form-input flex-center ">
                                            <div class="title">Nhân viên:</div>
                                            <select id="employeeSelected" class="flex-1 max-w-220"
                                                name="EmployeeSelected">
                                                <?php
                                                        $query = "SELECT EmployeeID, EmployeeName from employee";
                                                        fillOptionSelect( $query,"EmployeeID","EmployeeName",$_SESSION['invoiceImportEmployee']);
                                                  ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="text-center">STT</th>
                                                <th scope="col" class="text-center">Danh mục</th>
                                                <th scope="col" class="text-center">Linh kiện</th>
                                                <th scope="col" class="text-center">Số lượng</th>
                                                <th scope="col" class="text-center">Đơn giá nhập</th>
                                                <th scope="col" class="text-center">Thành tiền</th>
                                                <th scope="col" class="text-center" <?php  
                                               if(!isset($_GET["invoice-import"])&&!($_GET["invoice-import"]=="add")){
                                                   echo 'style="display:none"';
                                               }
                                               
                                                ?>>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <?php
                                            showProductInvoice();
                                            ?>
                                            </tr>
                                            <?php
                                        if($_SESSION["invoice_import_product"]){
                                            if(sizeof($_SESSION["invoice_import_product"])>0){
                                            echo ' <td colspan="5">
                                                        <strong style="text-align: ;">Tổng Tiền</strong>
                                                    </td>
                                                    <td colspan="2" style="text-align: right ;">
                                                    <strong ><span id="sumPrice">'.number_format(getTotalPrice("invoice_import_product"), 0, '', ',').'</span> VND </strong>
                                                    </td>
                                                    ';
                                            }
                                        }
                                    
                                        ?>



                                            <tr <?php  
                                            //Nếu khác method get = add thì ẩn element
                                               if(!isset($_GET["invoice-import"])&&!($_GET["invoice-import"]=="add")){
                                                   echo 'style="display:none"';
                                               }
                                               
                                            ?>>
                                                <td scope="col">
                                                    <input type="submit" class="btn btn-warning" id="btnAdd"
                                                        value="Thêm" name="addProductInvoice" />
                                                </td>
                                                <td scope="col">
                                                    <select id="categorySelect" class="flex-1 max-w-220"
                                                        name="CategorySelected">
                                                        <?php
                                                        $query = "SELECT CategoryID, CategoryName from category";
                                                        fillOptionSelect( $query,"CategoryID","CategoryName","");
                                                        ?>
                                                    </select>
                                                </td>
                                                <td scope="col">

                                                    <select id="productSelect" class="flex-1 " name="ProductSelected">
                                                        <?php
                                                    productsFirstCategoryID();
                                                    ?>
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


                                                <td colspan="2">

                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>

                            </div>
                            <div class="form-footer" <?php  
                            //Nếu khác method get = add thì ẩn element
                                               if(!isset($_GET["invoice-import"])&&!($_GET["invoice-import"]=="add")){
                                                   echo 'style="display: flex;justify-content: right;"';
                                               }
                                               
                                            ?>>
                                <input type="submit" name="cancelInvoiceImport" class="btn btn-light" id="btnCancel"
                                    value="Hủy bỏ" />
                                <input <?php  
                                //Nếu khác method get = add thì ẩn element
                                               if(!isset($_GET["invoice-import"])&&!($_GET["invoice-import"]=="add")){
                                                   echo 'style="display:none"';
                                               }
                                               
                                            ?> type="submit" name="addInvoiceImport" class="btn btn-warning"
                                    id="btnConfirm" value="Thêm hóa đơn" />
                            </div>
                        </div>
                    </form>
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

    td a {
        text-decoration: none;
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
        /* border-radius: 4px; */
        border: none;
        border-bottom: 1px dotted #ccc;
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

    #invoiceImport select {
        word-wrap: normal;
        width: 100%;
        height: 34px;
        border: 1px solid #ccc;
        border: none;
        padding: 0;
        border-radius: 0;
        border-bottom: 1px dotted #ccc;
        outline-color: red;
    }

    #invoiceImport .form-footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    tbody,
    td,
    tfoot,
    th,
    tr {
        border-color: inherit;
        border-style: solid;
        border-width: 0;
        border-top: none !important;
        border-right: 1px dotted #ccc;
        border-left: 1px dotted #ccc;
    }
    </style>

</html>