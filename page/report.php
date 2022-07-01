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
    require_once "./layout/header.php";
    ?>
    <div class="content p-l-24 p-r-24 p-t-24 ">
        <div class="content-header p-b-24 justify-between">
            <div class="left">
                Thống kê phân tích
            </div>
            <div class="right flex-center">
                <div class="search m-r-24">
                    <form action="report.php" class="filter" method="POST">
                        <select name="date-pick" id="">
                            <?php
                            $month = $_POST['date-pick'];
                            for ($i = 1; $i <= 12; $i++) {?>
                                echo '
                                            <!-- <option value=' . $i . '>Tháng ' . $i . '</option> -->
                                            <option value="<?php echo $i;?>" <?php echo ($i==  $month) ? ' selected="selected"' : '';?>><?php echo 'Tháng ' .$i ;?></option>
                                            ';
                                            
                            <?php }
                            ?>
                        </select>
                        <button class="btn_filter">Lọc</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="table-wraper p-l-24 p-r-24 ">


            <!-- Biểu đồ thống kê năm-->
            <div class="chart-wrapper">
                <div class="chart-title">Biểu đồ thống kê theo tháng</div>
                <?php

                require_once '../utilities/check-error.php';
                require_once '../database/connect_db.php';
                require_once "../utilities/gender.php";
                $db = new Database();
                $db->connect_db(); //kết nối database
                $query = "SELECT Month(DateCreate) as Month, SUM(TotalExport*PriceExport) as Turnover from export_invoice INNER JOIN export_invoice_product ON export_invoice_product.InvoiceID=export_invoice.InvoiceID GROUP BY Month";
                $data = $db->getData($query);
                $dataPoints = array();
                for ($i = 1; $i <= 12; $i++) {
                    $newArray = ["x" => $i, "y" => 1];
                    $isFlag = true;
                    for ($j = 0; $j < count($data); $j++) {
                        if ($i == $data[$j]["Month"]) {
                            $newArray["y"] = (int)$data[$j]["Turnover"];
                            $dataPoints[] = $newArray;
                            $isFlag = false;
                            break;
                        }
                    }
                    if ($isFlag) {
                        $dataPoints[] = $newArray;
                    }
                }

                ?>
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>

            <!-- Table thống kê chi tiết -->
            <div class="table-report-wrapper">
                <div class="chart-title">Bảng thống kê chi tiết</div>
                <?php
                $query1 = "SELECT product.ProductName, b2.TotalExport, b2.PriceExport,b1.TotalImport,product.Quality from product  join (SELECT ProductID, TotalImport,PriceImport, import_invoice.DateCreate 
                FROM import_invoice_product JOIN import_invoice ON import_invoice_product.InvoiceID = import_invoice.InvoiceID) as b1 ON product.ProductID = b1.ProductID  JOIN
                (SELECT ProductID,TotalExport,PriceExport, DateCreate 
                FROM export_invoice_product  JOIN export_invoice ON export_invoice_product.InvoiceID = export_invoice.InvoiceID) as b2 ON product.ProductID = b2.ProductID
                WHERE Month(b2.DateCreate) = $month
                 GROUP BY product.ProductName";
                $data1 = $db->getData($query1);
                $db->close_db();
                //bind dữ liệu ra bảng
                if (count($data1) > 0) {
                    echo '

            <div class="table-wraper p-l-24 p-r-24 ">
                <!-- Biểu đồ thống kê năm-->
                <div class="chart-wrapper">
                    <div class="chart-title">Biểu đồ thống kê theo tháng</div>
                    <?php
                         require_once '../utilities/check-error.php';
                         require_once '../database/connect_db.php';
                         require_once "../utilities/gender.php";
                         $db = new Database();
                         $db->connect_db(); //kết nối database
                         $query = "SELECT Month(DateCreate) as Month, SUM(TotalExport*PriceExport) as Turnover from export_invoice INNER JOIN export_invoice_product ON export_invoice_product.InvoiceID=export_invoice.InvoiceID GROUP BY Month";
                         $data = $db->getData($query);
                         $dataPoints=array();
                         for ($i=1; $i <=12 ; $i++) {
                           $newArray= ["x"=> $i, "y"=> 1];
                           $isFlag=true;
                            for ($j=0; $j <count($data) ; $j++) { 
                                if($i==$data[$j]["Month"]){
                                    $newArray["y"]=(int)$data[$j]["Turnover"];
                                    $dataPoints[]= $newArray;
                                    $isFlag=false;
                                    break;
                                }
                            }
                            if($isFlag){
                                $dataPoints[]= $newArray;
                            }
                         }
                      
                        ?>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>
                <!-- Table thống kê chi tiết -->
                <div class="table-report-wrapper">
                    <div class="chart-title">Bảng thống kê chi tiết</div>
                    <?php
         $query1 = "SELECT * FROM product INNER JOIN import_invoice_product ON product.ProductID = import_invoice_product.ProductID INNER JOIN export_invoice_product ON product.ProductID = export_invoice_product.ProductID GROUP BY product.ProductName";
         $data1 = $db->getData($query1);
         $db->close_db();
         //bind dữ liệu ra bảng
         if (count($data1) > 0) {
           echo'

           <table id="EmployeeTable" class="table table-hover">
           <thead>
             <tr>
               <th scope="col">STT</th>
               <th scope="col">Tên hàng</th>
               <th scope="col">Số lượng bán</th>
               <th scope="col">Số lượng nhập</th>
               <th scope="col">Số lượng tồn</th>
               <th scope="col">Doanh thu</th>
             </tr>
           </thead>
           <tbody>
           ';
                    for ($i = 0; $i < count($data1); $i++) {
                        echo '
           <tr>
               <th scope="row">' . ($i + 1) . '</th>
               <td>' . $data1[$i]['ProductName'] . '</td>
               <td>' . $data1[$i]['TotalExport'] . '</td>
               <td>' . $data1[$i]['TotalImport'] . '</td>
               <td>' . $data1[$i]['Quality'] . '</td>
               <td>' . number_format($data1[$i]['TotalExport'] * $data1[$i]['PriceExport'], 0, '', ',') . '</td>
               </tr>
               ';
                    }
                    echo '
           </tbody>
           </table>
           ';
                } else {
                    echo '
           <div class="empty_state">
             <h1 class="">Dữ liệu trống</h1>
             <p>Không có dữ liệu liên hệ admin để biết thêm chi tiết</p>
           </div>
           ';
                } ?>

            </div>
        </div>
        <!-- <div class="empty_state">
                      <h1 class="">Dữ liệu trống</h1>
                      <p>Không có dữ liệu liên hệ admin để biết thêm chi tiết</p>
                      </div> -->
    </div>
    <?php
    require_once "./employee-detail.php"
    ?>
    <script src="../lib/canvas/canvasjs.min.js"></script>
    <script src="../lib/bootstrap/js/bootstrap.js"></script>
    <script src="../lib/jquery/jquery.js"></script>
    <script type="text/javascript" src="../script/components/navbar.js"></script>
    <script>
        window.onload = function() {
            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                exportEnabled: true,
                theme: "light2", // "light1", "light2", "dark1", "dark2"

                axisY: {
                    includeZero: true
                },
                data: [{
                    type: "column", //change type to bar, line, area, pie, etc
                    //indexLabel: "{y}", //Shows y value on all Data Points
                    indexLabelFontColor: "#5A5757",
                    indexLabelPlacement: "outside",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
        }
    </script>
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

    .chart-title {
        margin-top: 20px;
        margin-bottom: 10px;
        font-weight: bold;
    }
    .filter{
        display: flex;
    }

    .btn_filter {
        background-color: #ffca2c;
        margin-left: 10px;
        border: 1px solid #ffc720;
        width: 50px;
        color: #000;
        border-radius: 4px;
    }
</style>

</html>