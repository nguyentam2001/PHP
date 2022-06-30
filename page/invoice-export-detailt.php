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
                    <form action="/ntstore/page/invoice.php?invoice=export" method="POST">
                        <div class="container">
                            <div class="form-header justify-center">
                                <div class="text">Hóa đơn bán hàng</div>
                            </div>

                            <?php
                            if(isset($_GET["InvoiceExportId"])&& $_GET["InvoiceExportId"]){
                                require_once "../database/connect_db.php";
                                require_once '../utilities/check-error.php';
                                $db = new Database();
                                $db->connect_db(); //kết nối database
                                $invoiceID=$_GET["InvoiceExportId"];
                                $query = " SELECT DateCreate,CustomerName,Address,PhoneNumber FROM export_invoice INNER JOIN customer on export_invoice.CustomerID=customer.CustomerID where export_invoice.InvoiceID =  $invoiceID";
                               $result =mysqli_query(  $db->conn,$query);
                                $row = mysqli_fetch_assoc($result);

                           echo '

                           <div class="form-content">
                           <div class="row">
                               <div class="col-6 ">
                               </div>
                               <div class="col">
                                   <div class="form-input flex-center justify-end">
                                       <div class="title m-r-24">Ngày bán: </div>
                                       <input class="flex-1 m-w-200" type="date" name="DateCreate" id="" value='.$row["DateCreate"].' readonly>
                                   </div>
                                   <div class="form-input flex-center justify-end">
                                       <div class="title m-r-24">Số hóa đơn: </div>
                                       <input class="flex-1 m-w-200" type="text" name="InvoiceID" value="'.$invoiceID.'" readonly>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="horizontal-line"></div>
                           </div>
                           <div class="row">
                               <div class="col-6">
                                   <div class="form-input flex-center ">
                                       <div class="title">Khách hàng: </div>
                                       '.$row["CustomerName"].'
                                   </div>
                                   <div class="form-input flex-center  ">
                                       <div class="title">Địa chỉ: </div>
                                       <div class="address">
                                       '.$row["Address"].'
                                       </div>
                                   </div>
                                   <div class="form-input flex-center ">
                                       <div class="title">Số điện thoai:</div>
                                       <div class="phone">
                                       '.$row["PhoneNumber"].'
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <div class="row">
                               <div class="horizontal-line"></div>
                           </div>

                           ';
                            }
                            ?>



                            <div class="row">
                                <div class="col-6">
                                    <div class="form-input flex-center ">
                                        <div class="title">Bên bán: </div>
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
                                            <th scope="col" class="text-center">STT</th>
                                            <th scope="col" class="text-center">Danh mục</th>
                                            <th scope="col" class="text-center">Linh kiện</th>
                                            <th scope="col" class="text-center">Số lượng</th>
                                            <th scope="col" class="text-center">Đơn giá bán</th>
                                            <th scope="col" class="text-center">Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                            if(isset($_GET["InvoiceExportId"])&& $_GET["InvoiceExportId"]){
                                                require_once "../database/connect_db.php";
                                                require_once '../utilities/check-error.php';
                                                $db = new Database();
                                                $db->connect_db(); //kết nối database
                                                $invoiceID=$_GET["InvoiceExportId"];
                                                $query = "SELECT TotalExport,PriceExport, ProductName, CategoryName 
                                                FROM export_invoice_product INNER JOIN product on export_invoice_product.ProductID=product.ProductID 
                                                INNER JOIN category ON product.CategoryID = category.CategoryID where export_invoice_product.InvoiceID= $invoiceID" ;
                                                    $data = $db->getData($query);
                                                    $db->close_db();
                                                    if(count($data)){
                                                        $totalPrice=0;
                                                        for ($i = 0; $i < count($data); $i++) {
                                                            $intoPrice=(int)($data[$i]['TotalExport'])*(int)($data[$i]['PriceExport']);
                                                            $totalPrice+=  $intoPrice;
                                                            echo '
                                                       <tr>
                                                       <td scope="row">' . ($i + 1) . '</td>
                                                       <td>' . $data[$i]['CategoryName'] . '</td>
                                                       <td>' . $data[$i]['ProductName'] . '</td>
                                                       <td>' . $data[$i]['TotalExport'] . '</td>
                                                       <td style="text-align: right ;">' .number_format($data[$i]['PriceExport'] , 0, '', ',') .' </td>
                                                       <td style="text-align: right ;">'.number_format($intoPrice , 0, '', ',') .' </td>
                                                      
                                                      </tr>
                                                       ';
                                                          }
                                      
                                      echo'  <tr>


                                            <td colspan="5">
                                                <strong>Tổng Tiền</strong>
                                            </td>
                                            <td colspan="2" style="text-align: right ;">
                                                <strong><span id="sumPrice">'.number_format($totalPrice , 0, '', ',') .' </span> VND </strong>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                    }
                                        ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <div class="form-footer">
                            <input type="submit" name="cancelInvoiceImport" class="btn btn-light" id="btnCancel"
                                value="Quay lại" />
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

    #btnAdd {
        height: 36px;
        padding: 0 12px;
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
        justify-content: flex-end;
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