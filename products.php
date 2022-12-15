<?php
include('user\includes\header.php');

if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);

    if ($category) {


        $cid = $category['id'];

?>

        <!-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                        $products = getProdByCategory($cid);

                        if (mysqli_num_rows($products) > 0) {
                            foreach ($products as $item) {
                        ?>
                                <div class="col-md-3 mb-2">
                                    <a href="#">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image'] ?>" alt="Product image" class="w-200">
                                                <h5 class="text-center"><?= $item['name'] ?></h5>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                        <?php
                            }
                        } else {
                            echo "No data available";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div> -->
        <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb__text">
                            <h2><?= $category['name'] ?></h2>
                            <div class="breadcrumb__option">
                                <a href="index.php">Home</a>
                                <span>Shop</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product spad">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            $products = getProdByCategory($cid);

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                                        <a href="product-view.php?product=<?= $item['slug'] ?>">
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
            </div>
        </section>
    <?php
    }
} else {
    ?>
     <div>
        <img src="img/404.jpg" alt="404 error">
    </div>
<?php
}

include('user\includes\footer.php');
?>