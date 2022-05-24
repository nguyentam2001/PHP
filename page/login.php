<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTStore</title>
</head>

<body>

    <div class="loginBox">
        <img src="../assets/img/avt-user.png" class="avatar">
        <h1>Đăng nhập</h1>

        <form action="login.php" method="post">
            <p>Tài khoản</p>
            <input type="text" class="inp-accountName" name="userName" placeholder="Tài khoản...">
            <p>Mật khẩu</p>
            <input type="password" class="inp-password" name="passWord" placeholder="Mật khẩu...">
            <button type="submit" class="btn-login" name="dangnhap">Đăng nhập</button>
            <?php

            require_once '../database/connect_db.php';

            if (isset($_POST["dangnhap"])) {
                if (!empty($_POST["userName"])) {
                    $AccountName = $_POST["userName"];
                } else {
                    echo '<p class="show_warning">Vui lòng điền tài khoản</p>';
                }
                if (!empty($_POST["passWord"])) {
                    $PassWord = $_POST["passWord"];
                } else {
                    echo '<p class="show_warning">Vui lòng điền mật khẩu</p>';
                }

                if (!empty($AccountName) && !empty($PassWord)) {
                    $dataBase = new Database();
                    $dataBase->connect_db();
                    $sql = "SELECT * FROM employee WHERE AccoutName ='" . $AccountName . "' AND Password = '" . $PassWord . "'";
                    $query = mysqli_query($dataBase->conn, $sql);

                    if (mysqli_num_rows($query) == 0) {
                        echo '<p class="show_warning">Tài khoản hoặc mật khẩu không chính xác!</p>';
                    } else {
                        echo 'Đăng nhập thành công';
                        $row = mysqli_fetch_assoc($query);
                        $_SESSION["id"] =  $row["EmployeeNameID"];
                        $_SESSION["user_name"] =  $row["EmployeeName"];
                        header("Location:/ntstore/page/overview.php");
                    }
                }
            }
            ?>
        </form>
    </div>

</body>
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url(../assets/img/backgroundLogin.jpg);
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
    }

    .loginBox {
        border-radius: 5px;
        width: 320px;
        height: 420px;
        background: #fff;
        color: #000;
        top: 50%;
        left: 50%;
        position: absolute;
        transform: translate(-50%, -50%);
        box-sizing: border-box;
        padding: 70px 30px;
    }

    .avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        position: absolute;
        top: -50px;
        left: 110px;
    }

    h1 {
        margin: 0;
        padding: 0 0 20px;
        text-align: center;
        font-size: 22px;
    }

    .loginBox p {
        margin: 0;
        padding: 0;
        font-weight: bold;
    }

    .loginBox input,
    .btn-login {
        width: 100%;
        margin-bottom: 20px;


    }

    .inp-accountName,
    .inp-password {
        border: none;
        border-bottom: 1px solid #ccc;
        background: transparent;
        outline: none;
        height: 40px;
        font-size: 16px;
    }

    .btn-login {
        border: none;
        outline: none;
        height: 40px;
        background: #ccc;
        font-size: 18px;
        border-radius: 20px;
    }

    .btn-login:hover {
        cursor: pointer;

    }

    .show_warning {
        color: red;
    }
</style>

</html>