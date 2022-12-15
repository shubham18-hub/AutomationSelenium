<?php
include('user\includes\header.php');
include('user\includes\hero.php');
?>

<!-- <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-md-3 mb-2">
                                <a href="products.php?category=<?= $item['slug'] ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image'] ?>" alt="Category image" class="w-200">
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

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <?php
                    $categories = getAllActive("categories");

                    if (mysqli_num_rows($categories) > 0) {
                        foreach ($categories as $item) {
                    ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
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
    </div>
</div>
<?php include('user\includes\footer.php'); ?>