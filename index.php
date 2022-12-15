<?php include('user\includes\header.php'); ?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shubham template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                
                <li><a href="#"><i class="fa fa-shopping-bag"></i></a></li>
            </ul>
         </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <a href="./login.html"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a>Shop</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./pulses.html">Pulses</a></li>
                        <li><a href="./vegetables.html">Vegetables</a></li>
                        <li><a href="./fruit.html">Fruits</a></li>
                        <li><a href="./sweets.html">Sweets</a></li>
                        <li><a href="./handicraft.html">Handicraft and Traditional Art</a></li>
                        <li><a href="./souvenir.html">Souvenir</a></li>
                        <li><a href="./traddress.html">Traditional Dress and Jewellery</a></li>
                    </ul>
                </li>
                <li><a>Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shopping-cart.html">Shopping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>sdarmwal17@gmail.com</li>
                <li>Free Shipping for all Order of Rs.99</li>
            </ul>
        </div>
    </div>
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <?php
                        $categories = getAllActive("categories");

                            if (mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $item) {
                            ?>
                                        <ul>
                                            <li><h6><a><?= $item['name'] ?></a></h6></li>
                                        </ul>
                            <?php
                                }
                            }
                            else{
                                echo("No data available");
                            }
                    ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__item set-bg" data-setbg="img/login/3.jpg"></div>
                </div>
            </div>
        </div>  
    </section>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php
                        $categories = getAllActive("categories");

                            if (mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $item) {
                            ?>
                                    <div class="col-lg-3">
                                        <a href="products.php?category=<?= $item['slug'] ?>">
                                            <div class="product__discount__item">
                                                <div class="product__discount__item__pic set-bg" data-setbg="uploads/<?= $item['image'];?>">
                                                </div>
                                                <div class="product__item__text">
                                                    <h6><a><?= $item['name'] ?></a></h6>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                }
                            }
                            else{
                                echo("No data available");
                            }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    include('user\includes\footer.php');
    ?>
</body>

</html>