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
                                <span>My Orders</span>
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
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tracking no</th>
                                        <th>Price</th>
                                        <th>Ordered On</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $orders = getOrders();

                                        if(mysqli_num_rows($orders)>0)
                                        {
                                            foreach ($orders as $item)
                                            {
                                                ?> 
                                                    <tr>
                                                        <td> <?= $item['id']; ?> </td>
                                                        <td> <?= $item['tracking_no']; ?> </td>
                                                        <td> <?= $item['total_price']; ?> </td>
                                                        <td> <?= $item['created_at']; ?> </td>
                                                        <td>
                                                            <a href="view-order.php?t=<?= $item['tracking_no']; ?> " class="btn btn-primary">View Details</a>
                                                        </td>

                                                    </tr>

                                                <?php

                                            }
                                        }
                                        else
                                        {
                                            ?> 
                                                <tr>
                                                    <td colspan="5">No data available</td>
                                                </tr>

                                            <?php
                                        }

                                    ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Shoping Cart Section Begin -->
            <section class="shoping-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shoping__cart__table">
                                <table>
                                    <thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Tracking no</th>
                                        <th>Price</th>
                                        <th>Ordered On</th>
                                        <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                            $orders = getOrders();

                                            if(mysqli_num_rows($orders)>0)
                                            {
                                                foreach ($orders as $item)
                                                {
                                                    ?> 
                                                        <tr>
                                                            <td> <?= $item['id']; ?> </td>
                                                            <td> <?= $item['tracking_no']; ?> </td>
                                                            <td> <?= $item['total_price']; ?> </td>
                                                            <td> <?= $item['created_at']; ?> </td>
                                                            <td>
                                                                <a href="view-order.php?t=<?= $item['tracking_no']; ?> " class="primary-btn">View Details</a>
                                                            </td>

                                                        </tr>

                                                    <?php

                                                }
                                            }
                                            else
                                            {
                                                ?> 
                                                    <tr>
                                                        <td colspan="5">No data available</td>
                                                    </tr>

                                                <?php
                                            }

                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shoping Cart Section End -->
            <?php
            include('user\includes\footer.php');
            ?>

        </body>