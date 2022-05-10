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
                    Tổng quan
                </div>
                <div class="right flex-center">

                </div>
            </div>
            <div class=" p-l-24 p-r-24 ">
                <div class="row row-cols-2 row-cols-lg-3   g-lg-5">
                    <div class="col">
                        <div class="  height-20vh card-item b-rd-4 border">
                            <div class="title">Sản phẩm</div>
                            <div class="number">30000 <span class="text">sản phẩm</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="  height-20vh card-item b-rd-4  border ">
                            <div class="title">Hóa đơn bán hàng</div>
                            <div class="number">30000 <span class="text">hóa đơn</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" height-20vh card-item b-rd-4 border ">
                            <div class="title">Hóa đơn mua hàng</div>
                            <div class="number">30000 <span class="text">Hóa đơn</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" height-20vh card-item b-rd-4 border ">
                            <div class="title">Hàng tồn kho</div>
                            <div class="number">30000 <span class="text">sản phẩm</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" height-20vh card-item b-rd-4  border ">
                            <div class="title">Tổng thu</div>
                            <div class="number">30000 <span class="text">Đồng</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" height-20vh card-item b-rd-4 border ">
                            <div class="title">Tổng tri</div>
                            <div class="number">30000 <span class="text">Đồng</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class=" height-20vh card-item b-rd-4 border ">
                            <div class="title">Nhà cung cấp</div>
                            <div class="number">30000 <span class="text">đơn vị</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="  height-20vh card-item b-rd-4 border ">
                            <div class="title">Khách hàng</div>
                            <div class="number">30000 <span class="text">khách hàng</span> </div>
                            <div class="sum-text text">TỔNG</div>
                        </div>
                    </div>


                </div>
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
  require_once "./employee-detail.php"
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
        <script type="text/javascript" src="../script/employee.js"></script>
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

    .card-item {
        border-radius: 8px;
        background-color: #fff;
        padding: 20px 20px;
    }

    .card-item .title {
        font-size: 16px;
        font-weight: 600;
        padding-bottom: 10px;
        border-bottom: 1px dashed #ccc;
        border-width: 0.5px;

    }

    .card-item .number {
        color: #f8872a;
        font-size: 24px;
        font-weight: 700;
        padding-top: 10px;

    }

    .card-item .text {
        font-size: 16px;
        font-weight: 500;
        color: #8796a7;
    }

    .card-item .sum-text {
        text-transform: uppercase;
    }


    .content-header .left {
        color: var(--black);
        font-size: 24px;
        font-weight: 700;
    }
    </style>

</html>