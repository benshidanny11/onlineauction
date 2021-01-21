<?php 
session_start();
if( !isset($_SESSION['loginid']) && !isset($_SESSION['username']) ) {
   header('Location: adminlogin.php');
   session_destroy();
} else {
   unset($_SESSION['loginid']);
   unset($_SESSION['username']);
   session_destroy();
   header('Location: adminlogin.php');
}
?>