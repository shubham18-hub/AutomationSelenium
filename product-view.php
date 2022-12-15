<?php
include('user\includes\header.php');

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

?>
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?= $product['name'] ?></h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span><?= $product['name'] ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php

    if ($product) {
    ?>
        <!-- <div class="container product_data mt-3">
            <div class="row">
                <div class="col-md-4">
                    <img src="uploads/<?= $product['image']; ?>" alt="Product Image" class="w-100">
                </div>
                <div class="col-md-8">
                    <h4 class="fw-bold">
                        <?= $product['name']; ?>
                        <span class="float-end text-danger">
                            <?php if ($product['trending']) {
                                echo ('Trending');
                            }

                            ?>
                        </span>
                    </h4>
                    <hr>
                    <p><?= $product['small_description']; ?></p>
                    <div class="row">
                        <div class="col-md-6">
                            <h5>₹
                                <span class="text-success fw-bold">
                                    <?= $product['selling_price']; ?>
                                </span>
                            </h5>
                        </div>
                        <div class="col-md-6">
                            <h5>₹
                                <s class="text-danger">
                                    <?= $product['original_price']; ?>
                                </s>
                            </h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3" style="width:130px">
                                <button class="input-group-text decrement-btn">-</button>
                                <input type="text" class="form-control bg-white input-qty text-center" value="1" disabled>
                                <button class="input-group-text increment-btn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <button class="btn btn-primary px-4 addToCartBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"> </i> Add to Cart</button>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"> </i> Add to Wishlist</button>
                        </div>
                    </div>
                    <hr>
                    <h6>Product description</h6>
                    <p><?= $product['description']; ?></p>

                </div>
            </div>
        </div> -->
        <section class="product-details spad">
            <div class="container product_data">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="product__details__pic">
                            <div class="product__details__pic__item">
                                <img class="product__details__pic__item--large" src="uploads/<?= $product['image']; ?>" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product__details__text">
                            <h2><?= $product['name']; ?></h2>
                            <h4>₹
                                <span>
                                    <?= $product['selling_price']; ?>
                                </span>
                                <s class="text-danger">
                                    <?= $product['original_price']; ?>
                                </s>
                            </h4>

                            <p><?= $product['small_description']; ?></p>
                            <div class="product__details__quantity">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-3" style="width:130px">
                                            <button class="input-group-text decrement-btn">-</button>
                                            <input type="text" class="form-control bg-white input-qty text-center" value="1" disabled>
                                            <button class="input-group-text increment-btn">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="primary-btn addToCartBtn" type="submit" value="<?= $product['id']; ?>">ADD TO CART</button>
                            <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <h3>Description</h3>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                    <div class="product__details__tab__desc">
                                        <h5>Products Infomation</h5>
                                        <p><?= $product['small_description']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    } else {
    ?>
        <div class="center">
            <img src="img/404.jpg" alt="404 error">
        </div>
    <?php
    }
} else {
    ?>
    <div class="center">
        <img src="img/404.jpg" alt="404 error">
    </div>
<?php
}
include('user\includes\footer.php');
?>