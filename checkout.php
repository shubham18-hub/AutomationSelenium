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
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<body>
    <!-- <div class="py-5">
        <div class="container">
            <div class="card">
                <div class="card-body shadow">
                    <form action="user\userfunctions\placeorder.php" method="post">
                        <div class="row">
                            <div class="col-md-7">
                                <h5>Basic Details</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Name</label>
                                        <input type="text" name="name" required placeholder="Enter your full name" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Email</label>
                                        <input type="email" name="email" required placeholder="Enter your email" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Phone</label>
                                        <input type="text" name="phone" required placeholder="Enter your phone number" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Pin Code</label>
                                        <input type="text" name="pincode" required placeholder="Enter your pincode" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="fw-bold">Address</label>
                                        <textarea name="address" required class="form-control" rows="5"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <h5>Order Details</h5>
                                <hr>
                                <?php $items = getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem) {
                                ?>
                                    <div class="mb-1 border">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                            </div>
                                            <div class="col-md-3">
                                                <label><?= $citem['name'] ?></label>
                                            </div>
                                            <div class="col-md-3">
                                                <label><?= $citem['selling_price'] ?></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label>x<?= $citem['prod_qty'] ?></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                                ?>
                                <h5>Total Price: <span class="float-end fw-bold"><?= $totalPrice ?></span> </h5>
                                <div class="">
                                    <input type="hidden" name="payment_mode" value="COD">
                                    <button type="submit" name="placeOrderBtn" class="btn btn-outline-primary w-100">Confirm and Place Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->




    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="user\userfunctions\placeorder.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="name" placeholder="Enter your full name" required>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <textarea name="address" required class="form-control" rows="5" placeholder="Enter your address"></textarea>
                            </div>
                            <div class="checkout__input">
                                <p>Pin Code<span>*</span></p>
                                <input type="number" name="pincode" placeholder="Enter your pincode" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="number" name="phone" placeholder="Enter your mobile number" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" placeholder="Enter your email" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <?php $items = getCartItems();
                                $totalPrice = 0;
                                foreach ($items as $citem) {
                                ?>
                                    <div>
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $citem['image'] ?>" alt="Image" width="60px">
                                            </div>
                                            <div class="col-md-3">
                                                <label><b><?= $citem['name'] ?></b></label>
                                            </div>
                                            <div class="col-md-3">
                                                <label><b><?= $citem['selling_price'] ?></b></label>
                                            </div>
                                            <div class="col-md-2">
                                                <label><b>X<?= $citem['prod_qty'] ?></b></label>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    $totalPrice += $citem['selling_price'] * $citem['prod_qty'];
                                }
                                ?>
                                <hr>
                                <div class="checkout__order__total">Total Price<span>₹<?= $totalPrice ?></span></div>
                                <button type="submit" onclick="" name="placeOrderBtn" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    
    <?php
    include('user\includes\footer.php');
    ?>

</body>

</html>