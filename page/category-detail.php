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
                <div id="categoryForm">
                    <div class="continer">
                        <div class="form-header">
                            <div class="title-header">Thông tin danh mục</div>
                        </div>

                        <div class="form-content">
                            <div class="row">
                                <div class="col">
                                    <div class="form-input">
                                        <div class="title">Mã danh mục</div>
                                        <input readonly type="" name="CategoryID" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-input">
                                        <div class="title">Tên danh mục</div>
                                        <input type="" name="CategoryName" id="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-light" id="btnCancel">Hủy bỏ</button>
                            <button type="button" class="btn btn-warning" id="btnConfirm"> Đồng ý</button>
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

    #categoryForm {
        border-radius: 8px;
        width: 800px;
        background-color: white;
        padding: 24px;
    }

    #categoryForm .form-header {
        margin-top: 12px;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 24px;
    }

    #categoryForm .form-input {
        width: 100%;
        margin-top: 12px;
    }

    #categoryForm .form-input input {
        width: 100%;
        height: 34px;
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 0 16px;
        /* outline: thin; */
        outline-color: red;
    }

    #categoryForm .form-input .title {
        margin-bottom: 8px;
    }

    #categoryForm .form-footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }
    </style>

</html>