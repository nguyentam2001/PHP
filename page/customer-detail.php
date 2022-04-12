<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="display-form">
         <div class="form-wraper">
       <div id="customerForm">
         <div class="container">
            <div class="form-header">
                <div class="text">Thông tin khách hàng</div>
            </div>
            <div class="form-content">
            <div class="row">
                <div class="col-3">
                    <div class="form-input">
                          <div class="title">Mã khách hàng</div>  
                          <input type="text" name="CustomerCode" id="">    
                    </div>
                </div>
                <div class="col">
                <div class="form-input">
                          <div class="title">Tên khách hàng</div>  
                          <input type="text" name="CustomerName" id="">    
                    </div>
                </div>
                <div class="col">
                    <div class="form-check">
                          <div class="title">Giới tính</div>  
                            <div class="form-check-wraper">
                                <input type="radio" name="Gender" id="male"  value=1> <label for="male">Nam</label> 
                                <input type="radio" name="Gender" id="female" value=0><label for="female">Nữ</label>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                <div class="form-input">
                          <div class="title">Số điện thoại</div>  
                          <input type="text" name="PhoneNumber" id="">    
                    </div>
                </div>
                <div class="col">
                <div class="form-input">
                          <div class="title">Ngày sinh</div>  
                          <input type="date" name="DateOfBirth" id="">
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col">
                <div class="form-input">
                          <div class="title">Email</div>  
                          <input type="text" name="Email" id="">    
                    </div>
                </div>
               
            </div>
            <div class="row">
                <div class="col">
                <div class="form-input">
                          <div class="title">Địa chỉ</div>  
                          <input type="text" name="Address" id="">    
                    </div>
                </div>
               
            </div>
            
            </div>
            <div class="form-footer">
            <button type="button" class="btn btn-light" id="btnCancel">Hủy bỏ</button>
            <button type="button" class="btn btn-warning" id="btnConfirm">  Đồng ý</button>
            </div>
            </div>
        </div> 
    </div>
    </div>
   
</body>
<style>
    @import url(../style/page/customer-detail.css);
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

.display-form{
    display: none;
}

#customerForm {
  border-radius: 8px;
  width: 800px;
  background-color: white;
  padding: 24px;
}

#customerForm .form-header{
    margin-top: 12px;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 24px;
}
#customerForm .form-input{
    width: 100%;
    margin-top: 12px;
}

#customerForm .form-input input{
    width: 100%;
    height: 34px;
    border-radius: 4px;
    border: 1px solid #ccc;
    padding: 0 16px;
    /* outline: thin; */
    outline-color: red;
}

#customerForm .form-check{
    width: 100%;
    margin-top: 12px;
}

#customerForm .form-input .title{
    margin-bottom: 8px;
}

#customerForm .form-check .title{
    margin-bottom: 8px;
}
#customerForm .form-check .form-check-wraper{
    height: 34px;
    display: flex;
    align-items: center;
}

#customerForm .form-check-wraper label{
    margin-right: 12px;
    margin-left: 6px;
}

#customerForm .form-footer{
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 24px;
}
</style>
</html>