<?php
include('config.php');
include('function/myfunction1.php');

$checkLogin = false;
$againLogin = false;

if (isset($_SESSION['auth'])) {
    $againLogin = true;
    header('Location: index.php');
}


if (isset($_POST['loginBtn'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $login_query = "select * from signup where email='$email' and password ='$pass'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {

        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if ($role_as == 1) {
            redirect("admin/index.php", "Hey Admin! Welcome to Dashboard!");
        } else {

            redirect("index.php", "Logged In Successfully.");
        }
    } else {
        $checkLogin = true;
    }
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Bakhali Login Page</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Working Signin form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />


</head>

<body>

    <!-- form section start -->
    <section class="w3l-workinghny-form">
        <!-- /form -->
        <div class="workinghny-form-grid">
            <div class="wrapper">
                <div class="logo">
                    <h1><a class="brand-logo"><span>Bakhali</span></a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                </div>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="img/login/couple.jpg" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
                        <?php
                        if ($againLogin) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            You are already Logged In.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                        }
                        /* if ($adminLogin) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Hey Admin! Welcome to Dashboard!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                        } */
                        /* if ($loginSuccess) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            Logged In Successfully.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';
                        } */
                        if ($checkLogin) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Invalid Credentials
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                        }
                        ?>
                        <div class="login-form-content">
                            <h2>Login</h2>
                            <form action="login.php" class="signin-form" method="post">
                                <div class="one-frm">
                                    <label>Email</label>
                                    <input type="text" name="email" placeholder="" required="">
                                </div>
                                <div class="one-frm">
                                    <label>Password</label>
                                    <input type="password" name="pass" placeholder="" required="">
                                </div>
                                <!-- <label class="check-remaind">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    <p class="remember">Remember Me</p>

                                </label> -->
                                <button class="btn btn-style mt-3" name="loginBtn">Log In </button>
                                <p class="already">Don't have an account? <a href="signup.php">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- //form -->
        <!-- copyright-->
        <div class="copyright text-center">
            <div class="wrapper">
                <p class="copy-footer-29">© All rights reserved | Design by Shubham
            </div>
        </div>
        <!-- //copyright-->
    </section>
    <!-- //form section start -->
    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <script>
        <?php if (isset($_SESSION['message'])) { ?>

            alertify.set('notifier', 'position', 'top-right');
            alertify.success('<?= $_SESSION['message']; ?>');

        <?php
            unset($_SESSION['message']);
        }

        ?>
    </script>


</body>

</html>