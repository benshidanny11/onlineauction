<?php
session_start(); 

if (!isset($_SESSION['loginid']) || !isset($_SESSION['username']))
{

    if (isset($_POST['cmdlogin']))
    {

        $u = strip_tags($_POST['username']);
        $p = $_POST['password'];

        $db = mysqli_connect('localhost','root','','shop')
                or die('Error connecting to MySQL server.'); 
        $query = "SELECT UserID FROM user WHERE Username = '$u' AND Password = '$p' LIMIT 1";
        $result = mysqli_query($db, $query);
 
        if (mysqli_num_rows($result) != 1)
        {

            header("location:register.php?err=1");
        } else {
   
            $row = mysqli_fetch_array($result);

            $_SESSION['userid'] = $row['UserID'];

            $_SESSION['username'] = $u;

            header("location:index.php");
        }
    }
 
} else {
	 // The user is already loggedin, so we show the home page.
    header("location:index.php");
}
?>