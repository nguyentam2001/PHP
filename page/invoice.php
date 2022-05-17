<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../style/main.css">
        <link rel="shortcut icon" href="../assets/img/logo-tab.jpg" />
        <title>ntstore</title>
    </head>

    <body>
        <?php
  require_once "./layout/navbar.php";
  require_once "./layout/header.php"
  ?>
        <div class="content p-l-24 p-r-24 p-t-24 ">
            <div class="content-header p-b-24 justify-between">
                <div class="left">
                    Hóa đơn
                </div>
                <div class="right flex-center">
                    <div class="t-btn-wrapper">
                        <a 
                        <?php
                        if($_GET["invoice"]=="export"){
                             echo  'style="display:none"';
                        }
                ?>
               
                          href="./invoice-import-detail.php?invoice-import=add">
                            <button type="button" class="btn btn-warning"> <i class="fa-solid fa-receipt"></i> Nhập hóa
                                đơn </button>
                        </a>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="nav-item">

                <a 
                <?php
                if($_GET["invoice"]=="export"){
                    echo  'class="nav-link "';
                }else{
                    echo  'class="nav-link active"';
                }
                ?>
                 href="/ntstore/page/invoice.php"
                 >
              Hóa đơn nhập linh kiện
          </a>

                </li>
                <li class="nav-item">

                <a 
                <?php
                 if($_GET["invoice"]=="export"){
                    echo  'class="nav-link  active"';
                }else{
                    echo  'class="nav-link"';
                }
                ?>
                 href="/ntstore/page/invoice.php?invoice=export"
                >
                       Hóa đơn bán linh kiện
                   </a>
                </li>

            </ul>
            <div class="table-wraper p-l-24 p-r-24 ">
        <?php
            if(!isset($_GET["invoice"])&&!$_GET["invoice"]=="export"){
          require '../utilities/check-error.php';
          require '../database/connect_db.php';
          require_once "../utilities/gender.php";
          $db = new Database();
          $db->connect_db(); //kết nối database
          $query = "SELECT InvoiceID,InvoiceName ,m.ManufactureName,e.EmployeeName,ii.DateCreate,m.PhoneNumber FROM manufacture m INNER JOIN import_invoice ii ON m.ManufactureID = ii.ManufactureID INNER JOIN employee e ON ii.EmployeeID = e.EmployeeID";
          $data = $db->getData($query);
          $db->close_db();
          //bind dữ liệu ra bảng
          if (count($data) > 0) {
            echo'
            <table id="EmployeeTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Số hóa đơn</th>
                <th scope="col">Tên hóa đơn</th>
                <th scope="col">Nhà cung cấp</th>
                <th scope="col">Người tạo</th>
                <th scope="col">Ngày tạo</th>
                <th scope="col">Điện thoại khách hàng</th>
                <th scope="col " class="max-w-100">Chức năng</th>
              </tr>
            </thead>
            <tbody>
            ';
            for ($i = 0; $i < count($data); $i++) {
              echo '
         <tr>
         <th scope="row">' . ($i + 1) . '</th>
         <td>' . $data[$i]['InvoiceID'] . '</td>
         <td>' . $data[$i]['InvoiceName'] . '</td>
         <td>' . $data[$i]['ManufactureName'] . '</td>
         <td>' . $data[$i]['EmployeeName'] . '</td>
         <td>' . date("d/m/Y", strtotime($data[$i]['DateCreate'])) . '</td>
         <td>' . $data[$i]['PhoneNumber'] . '</td>
         <td>
             <div class="table-function">
             <a href="../function/invoice/show-product-detail.php?get-invoice-import='.$data[$i]['InvoiceID'].'">
          Chi tiết
          </a>
             </div>
         </td>
        </tr>
         ';
            }
            echo'
            </tbody>
            </table>
            ';
          }else{
            echo'
            <div class="empty_state">
              <h1 class="">Dữ liệu trống</h1>
              <p>Không có dữ liệu liên hệ admin để biết thêm chi tiết</p>
            </div>
            ';
          }

        }else{
            echo'
            <div class="empty_state">
              <h1 class="">Dữ liệu trống</h1>
              <p>Không có dữ liệu liên hệ admin để biết thêm chi tiết</p>
            </div>
            ';
        }
          ?>
            </div>
        </div>
        <script src="../lib/bootstrap/js/bootstrap.js"></script>
        <script src="../lib/jquery/jquery.js"></script>
        <script type="text/javascript" src="../script/components/navbar.js"></script>
        <script src="../script/common/enum.js"></script>
        <script src="../script/common/common.js"></script>
        <script src="../script/common/toast.js"></script>
        <script src="../script/common/modal.js"></script>
     
    </body>
    <style>
    @import url(../style/components/input.css);
    @import url(../style/components/button.css);
    @import url(../style/components/table.css);
    @import url(../style/components/toast.css);
    @import url(../style/components/modal.css);
    @import url(../style/components/empty-state.css);

    .content {
        height: calc(100vh - var(--header));
        width: calc(100% - var(--navbar));
        background-color: #f4f5f8;
        float: right;
        display: flex;
        flex-direction: column;
    }

    .content-header {
        padding-bottom: 0px;
    }

    .content-header .left {
        color: var(--black);
        font-size: 24px;
        font-weight: 700;

    }
    .nav-tabs .active{
        border-bottom:none;
    }

    td a {
        text-decoration: none;
    }

    .table-wraper {
        border: 1px solid #ccc;
        border-top: none;
        border-radius: 0px;
    }
    </style>

</html>