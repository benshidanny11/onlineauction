<?php

if (!isset($_SESSION['loginid']) || !isset($_SESSION['username']))
{

    if (isset($_POST['cmdlogin']))
    {

        $u = strip_tags($_POST['username']);
        $p = $_POST['password'];

        $db = mysqli_connect('localhost','root','','shop')
                or die('Error connecting to MySQL server.'); 
        $query = "SELECT username FROM admin WHERE username = '$u' AND password = '$p' LIMIT 1";
        $result = mysqli_query($db, $query);
 
        if (mysqli_num_rows($result) != 1)
        {

            header("location:adminlogin.php?err=1");
        } else {
   
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['UserID'];

            $_SESSION['username'] = $u;
            $_SESSION['role'] = 'admin';

            header("location:dashboard.php");
        }
    }
 
} else {
	 // The user is already loggedin, so we show the home page.
    header("location:dashboard.php");
}
?>


<?php 
session_start(); 

// if(isset($_SESSION['userid'])){
//     header('Location: index.php');
// }   

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
      Online auction:: Register || Login
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <?php include 'header.php';?>


    <div id="all">

        <div id="content d-flex justify-content-center">
            <div>
            <div class="container ">

                

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Home</a>
                        </li>
                        <li>Login as admin</li>
                    </ul>

                </div>
                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <?php 
                        if(isset($_GET['err']) && $_GET['err'] == 1) {
                            echo '
                            <div class="alert alert-danger">
                                <strong>Error!</strong> You have entered an invalid username or password.
                            </div>
                            ';
                        }
                        ?>
                        <form action="adminlogin.php" method="post">
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input type="text" class="form-control" id="email" name="username">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="cmdlogin" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>

        
            <!-- /.container -->
        </div>

        <!-- /#content -->


        
    <?php include 'footer.php';?>

    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>



</body>

</html>
