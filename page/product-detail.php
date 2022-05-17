<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="show-detail">
        <div class="form-wraper">
            <div class="productForm">
                <div class="container">
                    <div class="title">Thông tin sản phẩm</div>
                </div>
                <div class="content">
                    <div class="row">
                        <div class="col">
                            <div class="input">
                                <div class="title">Mã sản phẩm</div>
                                <input type="text" name="ProductID">
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
                                <input type="text" name="ExportPrice">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input">
                                <div class="title">Giá xuất</div>
                                <input type="text" name="ImportPrice">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="input">
                                <div class="title">Mã danh mục</div>
                                <input type="text" name="CategoryID">
                            </div>
                        </div>
                        <div class="col">
                            <div class="input">
                                <div class="title">Chi tiết</div>
                                <input type="text" name="Description">
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

    .show-detail {
         display: none; 
    }

    .productForm {
        border-radius: 8px;
        width: 800px;
        background-color: white;
        padding: 24px;
    }

    .productForm .container {
        margin-top: 12px;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 24px;
    }

    .productForm .input {
        width: 100%;
        margin-top: 12px;

    }

    .productForm .input input {

        width: 80%;
        height: 34px;
        border-radius: 4px;
        border: 1px solid #ccc;
        padding: 0 16px;
        /* outline: thin; */
        outline-color: red;
    }

    .productForm .input .title {
        margin-bottom: 8px;
    }

    .productForm .form-footer {
        margin-top: 40px;
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }
</style>

</html>