<?php
session_start();

        function getQualityPickById($productId){
        $totalPick=0;
        if(isset($_SESSION["invoice_sell_product"])){
            for($i=0;$i<sizeof($_SESSION["invoice_sell_product"]);$i++){
                if($_SESSION["invoice_sell_product"][$i]["ProductID"]==$productId){
                    $totalPick= (int) $_SESSION["invoice_sell_product"][$i]["quantityPick"];
                }
            }
}

        return $totalPick;    
    }



?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
            integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap"
            rel="stylesheet" />
        <link rel="shortcut icon" href="../assets/img/logo-tab.jpg" />
        <title>ntstore</title>
        <link rel="stylesheet" href="./assest/css/base.css" />
        <link rel="stylesheet" href="./assest/css/main.css" />
        <link rel="stylesheet" href="./assest/css/grid.css" />
        <link rel="stylesheet" href="./assest/css/responsive.css" />
        <link rel="stylesheet" href="./assest/font/fontawesome-free-5.15.3-web/css/all.min.css" />
        <link rel="stylesheet" href="./assest/css/product.css" />
    </head>

    <body>
        <?php
        require_once "layout/header.php"
        ?>
        <div class="main">
            <div class="grid wide">
                <div class="content">
                    <?php
                    if(isset($_GET["productID"])&&$_GET["productID"]){
                        $ProductID=$_GET['productID'];
                        require_once '../utilities/check-error.php';
                        require_once '../database/connect_db.php';
                        $db = new Database();
                        $db->connect_db(); //kết nối database
                        $query=" SELECT * FROM product INNER JOIN category  ON product.CategoryID= category.CategoryID where  ProductID= $ProductID";
                        $result=mysqli_query($db->conn,$query);
                        $row = mysqli_fetch_assoc($result);
                        echo'
                    <div class="row">
                        <div class="link-shop-background col l-12">
                            <ul class="link-shop">
                                <li class="link-shop-item">
                                    <a href="./index.php" class="link-shop-item_link access">NTstore</a>
                                    <i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="link-shop-item">
                                    <a href="#" class="link-shop-item_link">Đồ công nghệ</a>
                                    <i class="fas fa-chevron-right"></i>
                                </li>
                                <li class="link-shop-item">
                                    <a href="#" class="link-shop-item_link">'.$row["CategoryName"].'</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- container-product -->
                   

                        <div class="container-item row">
                        <div class="product-item col l-5">
                            <div class="product-item__img"
                                style="background-image:  url(../assets/img/items/'.$row['Image'].')">
                            </div>
                            <div class="product-item-list">

                            </div>
                            <div class="social-favorite">
                                <span class="social">
                                    Chia sẻ:
                                    <i class="fab fa-facebook-messenger social-icon"></i>
                                    <i class="fab fa-facebook social-icon"></i>
                                    <i class="fab fa-pinterest social-icon"></i>
                                    <i class="fab fa-twitter-square social-icon"></i>
                                </span>

                                <span class="favorite">
                                    <i class="far fa-heart favorite-icon"></i>
                                    Đã thích (249)

                                </span>
                            </div>
                        </div>
                        <div class="col l-7">
                            <div class="row">
                                <div class="col l-12">
                                    <div class="item-body">
                                     <form method="POST" action="/ntstore/frontend/cart.php">
                                        <div class="item-body-header">
                                            <span class="home-product-item__favourite">
                                                <span>Yêu thích</span>
                                            </span>

                                            <p class="item-body_des">
                                               '.$row["ProductName"].'
                                            </p>
                                        </div>
                                        <div class="item-body_status">
                                            <div class="item-body_status-start item-body_status-content">
                                                <span class="status-start-rate">4/5</span>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                                <i class="home-product-item__star--gold fas fa-star"></i>
                                            </div>
                                            <span class="item-body_status-review item-body_status-content">
                                                <span class="status-review">4</span> Đánh Giá
                                            </span>
                                            <span class="item-body_status-sell item-body_status-content">
                                                <span class="status-sell">9</span> Đã Bán
                                            </span>
                                        </div>

                                        <div class="item-body__price">
                                            <span class="product-item__price-old">980.000đ</span>
                                            <span class="product-item__price-current">'.number_format($row["ExportPrice"], 0, '', ',').'đ</span>
                                            <span class="product-item__price-percent"> 43% giảm</span>
                                        </div>

                                        <div class="item-body__oder">
                                            <span class="item-body__oder_deal-header item-body__oder-title">
                                                Deal Sốc
                                            </span>
                                            <span class="
                        item-body__oder_deal-content item-body__oder-content
                      ">
                                                Mua kèm Deal Sốc
                                            </span>
                                        </div>
                                        
                                        <div class="item-body__oder">
                                            <span class="
                        item-body__oder-title item-body__oder-title-classify
                      ">
                                                Loại
                                            </span>
                                            <div class="
                        item-body__oder-content item-body__oder-content-classify
                      ">
                                                <div class="content-classify__btn content-classify__btn-one">
                                                    '.$row["CategoryName"].'
                                                </div>
                                              
                                            </div>
                                        </div>
                                        <div class="item-body__oder">
                                            <span class="item-body__amount-title item-body__oder-title">
                                                Số lượng
                                            </span>
                                            <div class="
                         item-body__oder-content item-body__content-amount
                      ">
                                                <span class="item-body__oder-amount item-body__oder-minus" onclick="minusProduct()" >-</span>
                                                <input type="text" readonly name="quantityPick" value="1" class="item-body__oder-amount item-body__oder-current"/>
                                                <input type="hidden"  name="ProductID" value='.$row["ProductID"].'>
                                                <input type="hidden"  name="CategoryID" value='.$row["CategoryID"].'>
                                                <input type="hidden"  name="ProductName" value='.$row["ProductName"].'>
                                                <input type="hidden"  name="ExportPrice" value='.$row["ExportPrice"].'>
                                                <input type="hidden"  name="ProductImage" value='.$row["Image"].'>
                                                <span value='.$row["Quality"].' class="item-body__oder-amount item-body__oder-plus"  onclick="addProduct()">+</span>
                                            </div>
                                        </div>

                                        <div class="item-body__oder">
                                            <button onclick="return checkform()" type="submit" id="addCart" name="add-cart" value="add-cart" class="item-body__btn-add-cart btn-border">
                                                <i class="fas fa-cart-plus"></i>
                                                Thêm vào giỏ hàng
                                            </button>
                                            <a href="/ntstore/frontend/cart.php">
                                                <button onclick="return checkform()" type="submit" id="buyNow"  name="buy-now" value="'.getQualityPickById($row["ProductID"]).'" class="btn-primary btn-oder">Mua Ngay</button>
                                            </a>

                                        </div>
                                        <hr>

                                        </form >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="product-content col l-12">
                            <div class="product-details">
                                <span class="product-details-title">
                                    Chi tiết sản phẩm
                                </span>
                                <div class="row product-details-container ">
                                    <div class="col l-1">
                                        <span class="product-details-cate">Danh mục</span>
                                    </div>
                                    <div class="col l-11">
                                        <ul class="link-shop">
                                            <li class="link-shop-item">
                                            <a href="./index.php" class="link-shop-item_link access">NTstore</a>
                                                <i class="fas fa-chevron-right"></i>
                                            </li>
                                            <li class="link-shop-item">
                                                <a href="#" class="link-shop-item_link">'.$row["CategoryName"].'</a>
                                                <i class="fas fa-chevron-right"></i>
                                            </li>
                                            <li class="link-shop-item">
                                                <a href="#" class="link-shop-item_link">'.$row["ProductName"].'</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="row product-details-container">
                                    <div class="col l-1">
                                        <span class="product-detail-store">Kho hàng</span>
                                    </div>
                                    <div class="col l-11">
                                        <span class="product-detail-store__sum">'.$row["Quality"].'</span>
                                    </div>
                                </div>

                                <div class="row product-details-container">
                                    <div class="col l-1">
                                        <span class="product-detail-from">Gửi từ</span>
                                    </div>
                                    <div class="col l-11">
                                        <span class="product-detail-from__address">
                                        CỬA HÀNG BÁN LINH KIỆN MÁY TÍNH NTSTORE</span>
                                    </div>
                                </div>
                                <span class="product-details-title product-description">
                                    Mô tả sản phẩm
                                </span>

                                <p class="product-description-details">
                                    '.$row["Description"].'
                                </p>
                            </div>
                        </div>
                    </div>
                    ';
                    $db->close_db();//ngắt kết nối database
                }
                ?>

                </div>
            </div>
            <script src="../lib/jquery/jquery.js"></script>
            <script>
            let currNum = 1;
            let total = +$(".item-body__oder-plus").attr("value");
            //JavaScript
            function minusProduct() {
                //lấy giá trị hiển thị hiện tại + thêm 1
                currNum = +$(".item-body__oder-current").val();
                if (currNum > 1) {
                    currNum--;
                    $(".item-body__oder-current").val(currNum);
                }
            }

            function addProduct() {
                //lấy tổng số lượng sp còn lại trong kho

                //lấy giá trị hiển thị hiện tại + thêm 1
                currNum = +$(".item-body__oder-current").val();
                if (currNum < total) {
                    currNum++;
                    $(".item-body__oder-current").val(currNum);
                }
            }

            function checkform() {
                let eleCart = document.querySelector("#buyNow");
                let qualityCart = eleCart.getAttribute("value");
                let elePick = document.querySelector("[name='quantityPick']")
                let qualityPick = elePick.getAttribute("value");
                if (parseInt(qualityCart) + parseInt(currNum) <= total) {
                    return true; //là cho phép
                } else {
                    alert(
                        `Bạn đã có ${parseInt(qualityCart)} sản phẩm trong giỏ, trong tổng số ${total} sản phẩm, số lượng sản phẩm không đủ`
                    );
                    return false;
                }

            }
            </script>
    </body>
    <style>
    .item-body__oder-current {
        max-width: 40px;
        padding: 0px;
        text-align: center;
        outline: none;
    }

    .main {
        margin-top: var(--height-header);
    }
    </style>

</html>