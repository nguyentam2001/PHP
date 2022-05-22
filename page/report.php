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
                        <select name="date-pick" id="">
                            <?php
                                    for ($i=1; $i <=12 ; $i++) { 
                                        echo '
                                        <option value='.$i.'>Tháng '.$i.'</option>
                                        ';
                                    }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="table-wraper p-l-24 p-r-24 ">


                <!-- Biểu đồ thống kê năm-->
                <div class="chart-wrapper">
                    <div class="chart-title">Biểu đồ thống kê theo tháng</div>
                    <?php
                        $dataPoints = array(
                            array("x"=> 1, "y"=> 41),
                            array("x"=> 2, "y"=> 35, "indexLabel"=> "DT Thấp"),
                            array("x"=> 3, "y"=> 50),
                            array("x"=> 4, "y"=> 45),
                            array("x"=> 5, "y"=> 52),
                            array("x"=> 6, "y"=> 68),
                            array("x"=>7, "y"=> 38),
                            array("x"=> 8, "y"=> 100, "indexLabel"=> "DT Cao"),
                            array("x"=> 9, "y"=> 52),
                            array("x"=> 10, "y"=> 60),
                            array("x"=> 11, "y"=> 36),
                            array("x"=> 12, "y"=> 49),

                        );
                            
                        ?>
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                </div>

                <!-- Table thống kê chi tiết -->
                <div class="table-report-wrapper">
                    <div class="chart-title">Bảng thống kê chi tiết</div>
                    <?php
          $search = $_GET['search'];
          require '../utilities/check-error.php';
          require '../database/connect_db.php';
          require_once "../utilities/gender.php";
          $db = new Database();
          $db->connect_db(); //kết nối database
          $query = "SELECT * from employee WHERE '$search' IS NOT NULL AND EmployeeName  LIKE CONCAT ('%$search%') OR '$search' IS NULL";
          $data = $db->getData($query);
          $db->close_db();
          //bind dữ liệu ra bảng
          if (count($data) > 0) {
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
           //render tr ở đây
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
    </style>

</html>