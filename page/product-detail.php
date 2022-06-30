<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NTstore</title>
    </head>

    <body>
        <div class="display-form">
            <div class="form-wraper">
                <div id="productForm">


                    <div class="box-left">
                        <div class="form-header">
                            <div class="title">Thông tin sản phẩm</div>
                        </div>

                        <div class="input-img">
                            <label id="imageView" for="imgInp"><span class="text">Chọn ảnh</span> </label>
                            <input hidden type="file" id="imgInp" name="Image">
                        </div>

                    </div>
                    <div class="box-right">
                        <div class="form-content">
                            <div class="row">
                                <div class="col">
                                    <div class="input">
                                        <div class="title">Mã sản phẩm</div>
                                        <input type="text" name="ProductID" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input">
                                        <div class="title">Tên sản phẩm</div>
                                        <input type="text" name="ProductName">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input">
                                        <div class="title">Giá nhập</div>
                                        <input type="text" name="ImportPrice">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input">
                                        <div class="title">Giá xuất</div>
                                        <input type="text" name="ExportPrice">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input">
                                        <div class="title">Tên danh mục</div>
                                        <select id="categorySelected" name="CategoryID" class="flex-1 max-w-220"
                                            id="cars">
                                            <?php
                                                $db = new Database();
                                                $db->connect_db(); //kết nối database
                                                $query = "SELECT CategoryID, CategoryName from category";
                                                $data = $db->getData($query);
                                                $db->close_db();
                                                $output="'<option value=''>-- Chọn danh mục --</option>'";
                                                if(count($data)>0){
                                                    for($i=0;$i<count($data);$i++){
                                                      
                                                        $output.='
                                                        <option value='.$data[$i]['CategoryID'].''.$selected.'>'.$data[$i]['CategoryName'].' </option>
                                                        ';
                                                    }
                                                }
                                                echo $output;
                                            ?>
                                        </select>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="input">
                                    <div class="title">Mô tả sản phẩm</div>
                                    <textarea name="Description" id="" cols="73" rows="4"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-footer">
                                    <button type="button" class="btn btn-light" id="btnCancel">Hủy bỏ</button>
                                    <button type="button" class="btn btn-warning" id="btnConfirm"> Đồng ý</button>
                                </div>

                            </div>
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

    .display-form {
        display: none;
    }

    .box-left {
        max-width: 240px;
    }

    #productForm {
        border-radius: 8px;

        display: flex;
        background-color: white;
        padding: 24px;
    }

    .input-img label {
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: 1px solid #ccc;
        width: 180px;
        border-radius: 4px;
        margin-top: 14px;
        margin-right: 20px;
        height: 180px;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .input-img label .text {
        opacity: 0.2;
    }

    #productForm .container {
        margin-top: 12px;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 24px;
    }

    #productForm .input {
        width: 100%;
        margin-top: 12px;

    }

    #productForm .input input {
        width: 100%;
        height: 34px;
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 0 16px;
        /* outline: thin; */
        outline-color: red;
    }

    #productForm .input .title {
        margin-bottom: 8px;
    }

    #productForm textarea {
        border: 1px solid #ccc;
        border-radius: 4px;
        outline-color: red;
    }

    #productForm .form-footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    #productForm #categorySelected {
        max-width: 100%;
    }

    .form-header {
        font-size: 20px;
    }
    </style>

</html>