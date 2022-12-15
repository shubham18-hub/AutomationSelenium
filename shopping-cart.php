<?php

    include('user\includes\header.php');
    include('authenticate.php');


        ?>
        <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2>Bakhali</h2>
                            <div class="breadcrumb__option">
                                <a href="index.php">Home</a>
                                <span>Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <body>

            <div class="py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="mycart">
                                <?php $items = getCartItems();

                                    if(mysqli_num_rows($items) > 0)
                                    {
                                ?>
                                        <div class="row align-items-center">
                                            <div class="col-md-5">
                                                <h6>Product</h6>
                                            </div>
                                            <div class="col-md-3">
                                                <h6>Price</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Quantity</h6>
                                            </div>
                                            <div class="col-md-2">
                                                <h6>Remove</h6>
                                            </div>
                                        </div>
                                        <div id="">

                                        <?php

                                            foreach ($items as $citem) 
                                            {
                                            ?>
                                                <div class="card product_data shadow-sm mb-3">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-2">
                                                            <img src="uploads/<?= $citem['image'] ?>" alt="<?= $citem['name'] ?>" width="100px">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5><?= $citem['name'] ?></h5>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <h5>Rs.<?= $citem['selling_price'] ?></h5>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="hidden" class="prodId" value="<?= $citem['prod_id'] ?>">
                                                            <div class="input-group mb-3" style="width:130px">
                                                                <button class="input-group-text decrement-btn updateQty">-</button>
                                                                <input type="text" class="form-control bg-white input-qty text-center" value="<?= $citem['prod_qty'] ?>" disabled>
                                                                <button class="input-group-text increment-btn updateQty">+</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button class="btn btn-danger btn-sm deleteItem" value="<?= $citem['cid'] ?>">
                                                                <i class="fa fa-trash me-2"></i>
                                                                Remove</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="shoping__cart__btns">
                                                    <a href="categories.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                                    <a href="checkout.php" class="primary-btn cart-btn cart-btn-right">Proceed to checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    else
                                    {
                                        
                                        ?>

                                        <div class="card card-body">
                                            <img src="img\empty cart.jpg" alt="your cart is empty" width="500px" height="500px">
                                        </div>

                                        <?php

                                    }
                                        ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            include('user\includes\footer.php');
            ?>

        </body>