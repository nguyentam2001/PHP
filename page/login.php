<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTstore</title>
</head>

<body>
    <div class="all">

        <form action="login.php" method="post">
            <div class="login-form">
                <div class="title">
                    <strong>Trang đăng nhập</strong>
                </div>
    
                <div class="login-infor">
                    <div class="login-body">
                        <div class="form-group">
                            <label for="email">Tài khoản:</label>
                            <input type="text" class="form-control" name="user_name_lg" placeholder="Nhập tên đăng nhập...">
                        </div>
    
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <input type="password" class="form-control" name="passlg" placeholder="Nhập mật khẩu..." required>
                        </div>
    
                        <button type="submit" class="btn btn-default" name="dangnhap">Đăng nhập</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <?php
    require_once '../database/connect_db.php';

    if (isset($_POST["dangnhap"])) {
        if (!empty($_POST["user_name_lg"])) {
            $AccountName = $_POST["user_name_lg"];
        } else {
            echo 'Vui lòng điền tài khoản <br/>';
        }
        if (!empty($_POST["passlg"])) {
            $PassWord = $_POST["passlg"];
        } else {
            echo 'Vui lòng điền mật khẩu <br/>';
        }

        if (!empty($AccountName) && !empty($PassWord)) {
            $dataBase = new Database();
            $dataBase->connect_db();
            $sql = "SELECT * FROM employee WHERE AccoutName ='" . $AccountName . "' AND Password = '" . $PassWord . "'";
            $query = mysqli_query($dataBase->conn, $sql);

            if (mysqli_num_rows($query) == 0) {
                echo 'Tài khoản hoặc mật khẩu không chính xác!';
            } else {
                echo 'Đăng nhập thành công';
                echo '<script type="text/javascript"> window.open("overview.php","_self");</script>';
            }
           
        }
    }
    ?>
</body>
<style>
    body{
        background-color: blanchedalmond;
    }
    .all{
        align-items: center;
        width: 100%;
        text-align: center;
    }
    .login-form {
        padding-top: 30px;
        align-items: center;
        width: 100%;
        height: 300px;
    }
    .title{
        height: 50px;
        width: 100%;
        font-size: 50px;
        color: blueviolet;
    }

    .login-infor{
        padding-top: 60px;
        font-size: 20px;
        
    }
</style>

</html>