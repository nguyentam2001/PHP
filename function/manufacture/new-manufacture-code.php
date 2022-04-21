<?php
  require '../../database/connect_db.php'; //kết nối cơ sở dữ liệu
  $database=new Database();
  $database->connect_db();//kết nối database
  //Thực hiện câu lệnh truy vấn
  $query="SELECT Max(ManufactureID) as max FROM manufacture";
  $data=$database->getData($query);
    if($data==TRUE){
        //lấy tổng số bản ghi
        $total=(int)($data[0]["max"])+1;
        if((int)$total<10){
            $total="0$total";
        }
        echo json_encode("KH$total");//trả về mã nhân viên mới
    }
  $database->close_db();//ngắt kết nối database
?>