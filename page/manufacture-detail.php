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
       <div id="manufactureForm">
         <div class="container">
            <div class="form-header">
                <div class="text">Thông tin nhà cung cấp</div>
            </div>
            <div class="form-content">
            <div class="row">
                <div class="col-3">
                    <div class="form-input">
                          <div class="title">Mã nhà cung cấp</div>  
                          <input type="text" name="ManufactureCode" id="">    
                    </div>
                </div>
                <div class="col">
                <div class="form-input">
                          <div class="title">Tên nhà cung cấp</div>  
                          <input type="text" name="ManufactureName" id="">    
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

#manufactureForm {
  border-radius: 8px;
  width: 800px;
  background-color: white;
  padding: 24px;
}

#manufactureForm .form-header{
    margin-top: 12px;
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 24px;
}
#manufactureForm .form-input{
    width: 100%;
    margin-top: 12px;
}

#manufactureForm .form-input input{
    width: 100%;
    height: 34px;
    border-radius: 4px;
    border: 1px solid #ccc;
    padding: 0 16px;
    /* outline: thin; */
    outline-color: red;
}

#manufactureForm .form-check{
    width: 100%;
    margin-top: 12px;
}

#manufactureForm .form-input .title{
    margin-bottom: 8px;
}

#manufactureForm .form-check .title{
    margin-bottom: 8px;
}
#manufactureForm .form-check .form-check-wraper{
    height: 34px;
    display: flex;
    align-items: center;
}

#manufactureForm .form-check-wraper label{
    margin-right: 12px;
    margin-left: 6px;
}

#manufactureForm .form-footer{
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
    margin-bottom: 24px;
}
</style>
</html>