<?php
session_start();
if (!isset($_SESSION['userid'])) {
  echo '<script>alert("You need to login first!");
  location.href="register.php";</script>';
}else{
  $userID = $_SESSION['userid'];
  echo '<script>alert("You have bought successfully product succcessfully, we will contact you later!");
  location.href="index.php";</script>';
}


?>