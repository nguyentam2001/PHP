

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style/main.css">
    <title>Document</title>
</head>
<body>
  <?php
  require_once "./layout/navbar.php";
  require_once "./layout/header.php"
  ?>
    
    <div class="content p-l-24 p-r-24 p-t-24 ">
        <div class="content-header p-b-24 justify-between">
            <div class="left">
                Khách hàng
            </div>
            <div class="right flex-center">
                <div class="search m-r-24">
                    <div class="icon-search icon-24"></div>
                    <input type="text" class="input-search" name="" id="">
                </div>
                <div class="t-btn-wrapper">
                    <button type="button" id="addCustomer" class="btn btn-warning">  <i class="fa-solid fa-user-plus"></i>Thêm</button>
                </div>
            </div>
        </div>
        <div class="table-wraper p-l-24 p-r-24 ">
<table id="CustomerTable" class="table table-hover">
  <thead>
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Mã KH</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Email</th>
      <th scope="col">Giới Tính</th>
      <th scope="col">Số điện thoại</th>
      <th scope="col">Ngày Sinh</th>
      <th scope="col">Địa chỉ khách hàng</th>
      <th scope="col " class="max-w-100">Chức năng</th>
    </tr>
  </thead>
  <tbody>
    <?php
  require '../utilities/check-error.php';    
  require '../database/connect_db.php';
  require_once "../utilities/gender.php";
   $db=new Database();
   $db->connect_db();//kết nối database
   $query="SELECT * FROM customer";
   $data=$db->getData($query);
   $db->close_db();
   //bind dữ liệu ra bảng
   if(count($data)>0){
     for($i=0;$i<count($data);$i++){
         echo '
         <tr>
         <th scope="row">'.($i+1).'</th>
         <td>'.$data[$i]['CustomerCode'].'</td>
         <td>'.$data[$i]['CustomerName'].'</td>
         <td>'.$data[$i]['Email'].'</td>
         <td>'.gender($data[$i]['Gender']).'</td>
         <td>'.$data[$i]['PhoneNumber'].'</td>
          <td>'.date("d/m/Y", strtotime($data[$i]['DateOfBirth'])).'</td>
         <td>'.$data[$i]['Address'].'</td>
         <td>
             <div class="table-function">
             <div class="btn-update" value ="'.$data[$i]['CustomerID'].'">Sửa</div>
              <div class="btn-delete" name="'.$data[$i]['CustomerName'].'" value ="'.$data[$i]['CustomerID'].'">Xóa</div>
             </div>
         </td>
       </tr>
         ';
     }
   }
    ?>
  </tbody>
</table>
  </div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
  <div id="toastSuccess" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-header">
    <i  class="fa-solid fa-circle-check toast-icon"></i>
      <strong class="me-auto toast-message"></strong>
      <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDelCustomer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" >Xóa Khách hàng</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body modal-messenger">
        Bạn có muốn xóa Khách hàng này không? 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <button type="button" class="btn btn-primary" id="btnDelCustomer" >Đồng ý</button>
      </div>
    </div>
  </div>
</div>
 </div>
    <?php
  require_once "./customer-detail.php"
  ?>
<script src="../script/common/enum.js"></script>
<script type="text/javascript" src="../script/customer.js"></script>
 
</body>
<style>
@import url(../style/components/input.css);
@import url(../style/components/button.css);
@import url(../style/components/table.css);
@import url(../style/components/toast.css);
@import url(../style/components/modal.css);
.content {
  height: calc(100vh - var(--header));
  width: calc(100% - var(--navbar));
  background-color:#f4f5f8;
  float: right;
    display: flex;
    flex-direction: column;
}
.content-header .left{
    color: var(--black);
    font-size: 24px;
    font-weight: 700;
}
.content-header .right{
   
}
</style>
</html>