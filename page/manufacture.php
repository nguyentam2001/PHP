<?php
session_start();
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
                    Nhà cung cấp
                </div>
                <div class="right flex-center">
                    <div class="search m-r-24">
                        <form action="manufacture.php" method="GET">
                            <button class="icon-search icon-24" type="submit"></button>
                            <input type="text" class="input-search" name="search" id="searchText"
                                placeholder="Tên nhà cung cấp...">
                        </form>
                    </div>
                    <div class="t-btn-wrapper">
                        <button type="button" id="addManufacture" class="btn btn-warning"> <i
                                class="fa-solid fa-user-plus"></i>Thêm</button>
                    </div>
                </div>
            </div>
            <div class="table-wraper p-l-24 p-r-24 ">
                <?php
          $search = $_GET['search'];
          require '../utilities/check-error.php';
          require '../database/connect_db.php';
          require_once "../utilities/gender.php";
          $db = new Database();
          $db->connect_db(); //kết nối database
          $query = "SELECT * from manufacture WHERE '$search' IS NOT NULL AND ManufactureName  LIKE CONCAT ('%$search%') OR '$search' IS NULL";
          $data = $db->getData($query);
          $db->close_db();
          //bind dữ liệu ra bảng
          if (count($data) > 0) {
            echo'
            <table id="ManufactureTable" class="table table-hover">
            <thead>
              <tr>
                <th scope="col">STT</th>
                <th scope="col">Mã NCC</th>
                <th scope="col">Tên Nhà cung cấp</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col " class="max-w-100">Chức năng</th>
              </tr>
            </thead>
            <tbody>
            ';

            for ($i = 0; $i < count($data); $i++) {
              echo '
         <tr>
         <th scope="row">' . ($i + 1) . '</th>
         <td>' . $data[$i]['ManufactureCode'] . '</td>
         <td>' . $data[$i]['ManufactureName'] . '</td>
         <td>' . $data[$i]['Address'] . '</td>
         <td>' . $data[$i]['PhoneNumber'] . '</td>
         <td>
             <div class="table-function">
             <div class="btn-update" value ="' . $data[$i]['ManufactureID'] . '">Sửa</div>
              <div class="btn-delete" name="' . $data[$i]['ManufactureName'] . '" value ="' . $data[$i]['ManufactureID'] . '">Xóa</div>
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
          ?>

            </div>
            <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="toast-header">
                        <i class="fa-solid fa-circle-check toast-icon"></i>
                        <strong class="me-auto toast-message"></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="modalDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa Khách hàng</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-messenger">
                            Bạn có muốn xóa Khách hàng này không?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <button type="button" class="btn btn-primary" id="btnDel">Đồng ý</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
  require_once "./manufacture-detail.php"
  ?>
        <script src="../lib/bootstrap/js/bootstrap.js"></script>
        <script src="../lib/jquery/jquery.js"></script>
        <script type="text/javascript" src="../script/components/navbar.js"></script>
        <script src="../script/common/enum.js"></script>
        <script src="../script/common/common.js"></script>
        <script src="../script/common/toast.js"></script>
        <script src="../script/common/modal.js"></script>
        <script src="../script/function/add.js"></script>
        <script src="../script/function/update.js"></script>
        <script src="../script/function/delete.js"></script>
        <script src="../script/function/new-code.js"></script>
        <script type="text/javascript" src="../script/manufacture.js"></script>
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

    .content-header .left {
        color: var(--black);
        font-size: 24px;
        font-weight: 700;
    }
    </style>

</html>