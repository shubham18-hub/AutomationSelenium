<?php
include('config.php');
include('function/myfunction1.php');


$showSuccess = false; 
$showError = false;
$checkPass = false;
$checkEmail = false;
$againLogin = false;
$invalidEmail = false;
$emptyfields = false; 
$invalidName = false;
$invalidPass = false;
$invalidPhone = false;


if (isset($_SESSION['auth'])) {
    $againLogin = true;
    header('Location: index.php');
}

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: index.php');
    exit();
}

if (isset($_POST['submitBtn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mno = mysqli_real_escape_string($con, $_POST['mno']);
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    $conpass = mysqli_real_escape_string($con, $_POST['conpass']);

    // email validation
    $check_email_query = "select email from signup where email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        $checkEmail = true;
    } else {
        if(!empty($name) && !empty($email) &&!empty($mno) &&!empty($pass) &&!empty($conpass) )
        {
            if(preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#", $pass))
            {
                if ($pass == $conpass) 
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        if (preg_match("/^[a-zA-Z-' ]*$/",$name)) 
                        {

                            if(preg_match('/^[0-9]{10}+$/', $mno)) 
                            {

                                $insert_query = "insert into signup(name, email, mobile, password) values ('$name', '$email', '$mno', '$pass')";
                                $insert_query_run = mysqli_query($con, $insert_query);

                                if ($insert_query_run) {
                                    // redirect("login.php", "Registered successfully");
                                    $showSuccess = true;
                                } else {
                                    // redirect("signup.php", "Something went wrong!!");
                                    $showError = true;
                                }
                            }else
                            {
                                $invalidPhone = true;
                            }
                        }else
                        {
                            $invalidName = true;
                        }
                    }else
                    {
                        $invalidEmail = true;
                    }

                } else {
                    // redirect("signup.php", "Passwords do not match!!");
                    $checkPass = true;
                }
            }else
            {
                $invalidPass = true;
            }
            
        }else
        {
            $emptyfields = true;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Working Signin form Responsive Widget Template :: W3layouts</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Working Signin form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

    <link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style1.css" type="text/css" media="all" />
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

    <section class="w3l-workinghny-form">

        <div class="workinghny-form-grid">
            <div class="wrapper">
                <h2><b>Registration Form</b></h2>
                <div class="workinghny-block-grid">
                    <div class="workinghny-left-img align-end">
                        <img src="img/login/couple.jpg" class="img-responsive" alt="img" />
                    </div>
                    <div class="form-right-inf">
                        <?php
                            if ($emptyfields) {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Please fill all the details.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                } 
                            if ($againLogin) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                You are already Logged In.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            if ($checkEmail) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Email already registered.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            if ($checkPass) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Passwords do not match.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }if ($invalidEmail) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Invalid email. Email should contain @gmail.com at end.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            if ($invalidName) {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Invalid name. Name should contain only alphabets.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                }
                            if ($invalidPass) {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    Invalid password. Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>';
                                }
                                if ($invalidPhone) {
                                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                        Mobile number should be of 10 digits. 
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>';
                                    }
                            if ($showError) {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Account creation failed. Something went wrong
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                            if ($showSuccess) {
                            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                Your Account is Created Successfully.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';
                            }
                        ?>
                        <form action="signup.php" class="needs-validation" novalidate method="post">

                            <div class="one-frm">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter your Name" required>
                            </div>
                            <div class="one-frm">
                                <label>Email</label>
                                <input type="text" name="email" placeholder="Enter your Email" required>
                            </div>
                            <div class="one-frm">
                                <label> Mobile Number</label>
                                <input type="number" name="mno" laceholder="Enter your Mobile Number" required>
                            </div>
                            <div class="one-frm">
                                <label>Password</label>
                                <input type="password" name="pass" placeholder="Enter your Password" required>
                            </div>
                            <div class="one-frm">
                                <label>Confirm Password</label>
                                <input type="password" name="conpass" placeholder="Confirm Password" required>
                            </div>
                            <div class="one-frm">
                                <button class="btn btn-style mt-3" type="submit" name="submitBtn">Sign Up</button>
                            </div>
                            <div class="one-frm">
                                <p class="already">Have an account? <a href="login.php">Log In</a></p>
                            </div>
                        </form>

                        <!-- </div> -->



                    </div>
                    <!-- </div> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>

        <div class="copyright text-center">
            <div class="wrapper">
                <p class="copy-footer-29">© All rights reserved | Design by Shubham
            </div>
        </div>

    </section>

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>