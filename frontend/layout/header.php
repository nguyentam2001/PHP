<div class="header">
    <div class="grid wide">
        <div class="header__navbar hide-on-tablet hide-on-mobile">
            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--separate">
                    Cửa hàng bán linh kiện máy tính NTSTORE
                </li>
                <li class="header__navbar-item">
                    <span class="header__navbar-text-connect"> Kết nối </span>
                    <a href="" class="header__navbar-icon-link header__navbar-icon-fa">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="" class="header__navbar-icon-link font-size-16">
                        <i class="fab fa-instagram"></i>
                    </a>
                </li>
            </ul>
            <ul class="header__navbar-list">
                <li class="header__navbar-item header__navbar-item--has-notify">
                    <a href="" class="header__navbar-item-link">
                        <i class="far fa-bell"></i>
                        Thông báo
                    </a>
                    <div class="header__navbar-toast">
                        <div class="header__toast--header">
                            <h3>Thông báo mới nhận</h3>
                        </div>
                        <div class="header__toast--contain">
                            <ul class="header__toast--body">
                                <li class="header__toast--item header__toast--item-view">
                                    <a href="" class="header__notify-link">
                                        <img src="./assest/img/toast/flycam.jpeg" alt="" class="header__toast-img" />
                                        <div class="item__body">
                                            <p class="item__body--title">
                                                Xác nhận đã thanh toán
                                            </p>
                                            <p class="item__body--decreption">
                                                Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                Việt Nam.
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__toast--item header__toast--item-view">
                                    <a href="" class="header__notify-link">
                                        <img src="./assest/img/toast/flycam.jpeg" alt="" class="header__toast-img" />
                                        <div class="item__body">
                                            <p class="item__body--title">
                                                Xác nhận đã thanh toán
                                            </p>
                                            <p class="item__body--decreption">
                                                Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                Việt Nam.
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__toast--item">
                                    <a href="" class="header__notify-link">
                                        <img src="./assest/img/toast/flycam.jpeg" alt="" class="header__toast-img" />
                                        <div class="item__body">
                                            <p class="item__body--title">
                                                Xác nhận đã thanh toán
                                            </p>
                                            <p class="item__body--decreption">
                                                Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                Việt Nam.
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li class="header__toast--item">
                                    <a href="" class="header__notify-link">
                                        <img src="./assest/img/toast/flycam.jpeg" alt="" class="header__toast-img" />
                                        <div class="item__body">
                                            <p class="item__body--title">
                                                Xác nhận đã thanh toán
                                            </p>
                                            <p class="item__body--decreption">
                                                Tòa nhà Capital Place, số 29 đường Liễu Giai,
                                                Phường Ngọc Khánh, Quận Ba Đình, Thành phố Hà Nội,
                                                Việt Nam.
                                            </p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="header__toast--footer">
                            <a href="" class="toast__footer--link">Xem tất cả</a>
                        </div>
                    </div>
                </li>
                <li class="header__navbar-item">
                    <a href="" class="header__navbar-item-link">
                        <i class="far fa-question-circle"></i>
                        Trợ giúp
                    </a>
                </li>
                <!-- <li
                class="
                  header__navbar-item
                  header__navbar-item--strong
                  header__navbar-item--separate
                "
              >
                Đăng nhập
              </li>
              <li class="header__navbar-item header__navbar-item--strong">
                Đăng ký
              </li> -->
                <li class="header__navbar-item header__navbar-user">
                    <a class="header__navbar-user-name" href="/ntstore/page/login.php">Đăng nhập quyền Admin</a>
                </li>
            </ul>
        </div>
        <!-- header with search -->
        <div class="header-with-search">
            <div class="header__menu-mobile" onclick="myFunction()">
                <i class="fas fa-bars header__menu-mobile__icons"></i>
                <i class="fas fa-times header-mobile-icons-close header__menu-mobile-hide"></i>
            </div>
            <a href="/ntstore/frontend/">
                <div class="header__logo">
                    <img src="../assets/img/ntstore-fe1.jpg" alt="">
                </div>
            </a>
            <div class="header__search">
                <div class="header__search-input-warp">
                    <form class="form-search" action="/ntstore/frontend/" method="GET">
                        <input type="text" class="header__search-input" placeholder="Nhập từ khóa..." name="search"
                            id="searchText" placeholder="Tên nhân viên..." />
                        <button class="header__search-btn" type="submit">
                            <i class="header__search-btn-icon fas fa-search"></i>
                        </button>
                    </form>
                    <!-- <input type="text" class="header__search-input" placeholder="Nhập từ khóa..." /> -->
                    <!-- search history -->
                </div>


            </div>

            <div class="header__cart">

                <div class="header__cart-group">
                    <a href="/ntstore/frontend/cart.php">
                        <i class="header__cart-icon fas fa-cart-plus"></i>
                    </a>

                    <span class="header__cart-notice"><?php echo(count($_SESSION["invoice_sell_product"]))?></span>
                    <!--Nếu có sản phẩm thì thêm : header_cart-list--no-cart -->
                    <div class="header_cart-list">
                        <img src="./assest/img/toast/no-cart.png" alt="" class="header_cart-no-cart-img" />
                        <span class="header_cart-no-cart-describe">Chưa có sản phẩm</span>

                        <!-- có sản phẩm -->
                        <h4 class="header__cart-heading">Sản phẩm mới thêm</h4>
                        <ul class="header__cart-list-items">

                            <?php
 if(isset($_SESSION["invoice_sell_product"])&&(is_array($_SESSION["invoice_sell_product"]))){
    for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
        $intoMoney=(int)$_SESSION["invoice_sell_product"][$i]["quantityPick"] *(int)$_SESSION["invoice_sell_product"][$i]["ExportPrice"];
         echo'


         <li class="header__cart-item">
         <img src="../assets/img/items/'.$_SESSION["invoice_sell_product"][$i]["ProductImage"].'" alt="" class="header__cart-item-img" />
         <div class="header__cart-item-infor">
             <div class="header__cart-item-head">
                 <h5 class="header__cart-item-name">
                     '.$_SESSION["invoice_sell_product"][$i]["ProductName"].'
                 </h5>
                 <div class="header__cart-item-total-money">
                     <span class="header__cart-item-price"><sup
                             class="header__cart-item-price-vnd">đ</sup>'.number_format($_SESSION["invoice_sell_product"][$i]["ExportPrice"]).'</span>
                     <span class="header__cart-item-multiply">x</span>
                     <span class="header__cart-item-quality">'.$_SESSION["invoice_sell_product"][$i]["quantityPick"].'</span>
                 </div>
             </div>
             <div class="header__cart-item-body">
                 <span class="header__cart-item-description">Phân loại: '.$_SESSION["invoice_sell_product"][$i]["CategoryName"].'</span>
             </div>
         </div>
     </li>
         ';
    }
}
?>


                        </ul>
                        <div class="header__cart-item-footer">
                            <a class="btn btn--primary header__cart-btn__check-product"
                                href="/ntstore/frontend/cart.php">
                                Xem giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
.header__logo {
    background-image: url("./assest/img/ntstore-fe.jpg");
    height: 66px;
    width: 196px;
    padding-left: 6px;
    padding-right: 6px;

}

.header__logo img {
    width: 100%;
    height: 100%;
}
</style>