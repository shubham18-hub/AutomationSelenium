<?php

include('user\includes\header.php');
include('authenticate.php');

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackingNoValid($tracking_no);

    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
    die();
}
$data = mysqli_fetch_array($orderData);

?>
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Bakhali</h2>
                    <div class="breadcrumb__option">
                        <a href="index.php">Home</a>
                        <span>My Orders/</span>
                        <span>View Order Details</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<body>

    <!-- <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <span class="text-white fs-4">View Order Details</span> 
                            <a href="my-orders.php" class="btn btn-warning float-end"> <i class="fa fa-reply"></i> Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Name</label>
                                            <div class="border p-1">
                                                <?= $data['name']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Email</label>
                                            <div class="border p-1">
                                                <?= $data['email']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Phone</label>
                                            <div class="border p-1">
                                                <?= $data['phone']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Tracking No.</label>
                                            <div class="border p-1">
                                                <?= $data['tracking_no']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Address</label>
                                            <div class="border p-1">
                                                <?= $data['address']; ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label class="fw-bold">Pin Code</label>
                                            <div class="border p-1">
                                                <?= $data['pincode']; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-6">
                                    <h4>Order Details</h4>
                                    <hr>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $userId = $_SESSION['auth_user']['user_id'];

                                            $order_query = "select o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* from orders o, order_items oi, products p where o.user_id = '$userId' and oi.order_id = o.id and p.id = oi.prod_id and o.tracking_no = '$tracking_no'";
                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) 
                                                {

                                                    ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="uploads/<?= $item['image']; ?>" width="70px" height="70px" alt="<?= $item['name']; ?>">
                                                                <?= $item['name']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $item['price']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $item['orderqty']; ?>
                                                            </td>
                                                            <td class="align-middle">

                                                            </td>
                                                        </tr>
                                                    <?php

                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span> </h5>

                                    <hr>

                                    <label class="fw-bold">Payment Mode:</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>

                                    <label class="fw-bold">Status:</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                            if($data['status'] == 0)
                                            {
                                                echo "Under Process";
                                            }
                                            else if($data['status'] == 1)
                                            {
                                                echo "Delivered";
                                            }
                                            else if($data['status'] == 2)
                                            {
                                                echo "Cancelled";
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    
    
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div>
                    <a href="my-orders.php" class="primary-btn cart-btn cart-btn-right"> <i class="fa fa-reply"></i> Back</a>
                    <h3>View Order Details</h3>
                </div>
                <hr>
                <form action="user\userfunctions\placeorder.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="checkout__input">
                                <label class="fw-bold">Name</label>
                                <div class="border p-1"><?= $data['name']; ?></div>
                            </div>
                            <div class="checkout__input">
                                <label class="fw-bold">Email</label>
                                <div class="border p-1"><?= $data['email']; ?></div>
                            </div>
                            <div class="checkout__input">
                                <label class="fw-bold">Phone</label>
                                <div class="border p-1"><?= $data['phone']; ?></div>
                            </div>
                            <div class="checkout__input">
                                <label class="fw-bold">Tracking No.</label>
                                <div class="border p-1"><?= $data['tracking_no']; ?></div>
                            </div>
                            <div class="checkout__input">
                                <label class="fw-bold">Address</label>
                                <div class="border p-1"><?= $data['address']; ?></div>
                            </div>
                            <div class="checkout__input">
                                <label class="fw-bold">Pin Code</label>
                                <div class="border p-1"><?= $data['pincode']; ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="checkout__order">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                            <?php
                                            $userId = $_SESSION['auth_user']['user_id'];

                                            $order_query = "select o.id as oid, o.tracking_no, o.user_id, oi.*, oi.qty as orderqty, p.* from orders o, order_items oi, products p where o.user_id = '$userId' and oi.order_id = o.id and p.id = oi.prod_id and o.tracking_no = '$tracking_no'";
                                            $order_query_run = mysqli_query($con, $order_query);

                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) 
                                                {

                                                    ?>
                                                        <tr>
                                                            <td class="align-middle">
                                                                <img src="uploads/<?= $item['image']; ?>" width="70px" height="70px" alt="<?= $item['name']; ?>">
                                                                <?= $item['name']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $item['price']; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= $item['orderqty']; ?>
                                                            </td>
                                                            <td class="align-middle">

                                                            </td>
                                                        </tr>
                                                    <?php

                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                                    <hr>
                                    <h5>Total Price: <span class="float-end fw-bold"><?= $data['total_price']; ?></span> </h5>

                                    <hr>

                                    <label class="fw-bold">Payment Mode:</label>
                                    <div class="border p-1 mb-3">
                                        <?= $data['payment_mode']; ?>
                                    </div>

                                    <label class="fw-bold">Status:</label>
                                    <div class="border p-1 mb-3">
                                        <?php
                                            if($data['status'] == 0)
                                            {
                                                echo "Under Process";
                                            }
                                            else if($data['status'] == 1)
                                            {
                                                echo "Delivered";
                                            }
                                            else if($data['status'] == 2)
                                            {
                                                echo "Cancelled";
                                            }
                                        ?>
                                    </div>
                                </div>
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