<div class="header justify-between">
    <div class="header-left">
        <div class="title">CỬA hàng linh kiện máy tính NTStore</div>
    </div>
    <div class="header-right flex-center">
        <div class="bell-icon icon-base"></div>
        <div class="admin flex-center">
            <?php
            echo '
            <div class="icon "></div>
            <div class="name" id="#" onclick="hideFunction()"> ' .   $_SESSION["user_name"]  . '</div>';
            ?>
            <div class="infor icon-down icon-14" onclick="myFunction()">

                <div id="Logout" class="showLogout">
                    <a href="logout.php">Đăng xuất</a>
                </div>
            </div>

        </div>

    </div>
</div>
<script>
    function myFunction() {
        document.getElementById("Logout").style.display = "block";

    }

    function hideFunction() {
        document.getElementById("Logout").style.display = "none";
    }
</script>
<style>
    .admin {
        cursor: pointer;
    }

    .infor {
        position: relative;
    }

    .showLogout {
        text-align: center;
        position: absolute;
        display: none;
        z-index: 5;
        width: 100px;
        background-color: #ccc;
        height: 30px;
        right: 0;
        top: 25px;
        line-height: 30px;
    }
    .showLogout a{
        color:black;
        text-decoration: none;
    }
</style>