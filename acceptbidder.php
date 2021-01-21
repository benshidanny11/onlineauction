<?php
  $db = mysqli_connect('localhost','root','','shop')
  or die('Error connecting to MySQL server.'); 
 
  $user=$_GET['bidder'];
  $item=$_GET['itemno'];
   $query="UPDATE `bids` set status='winned' WHERE ItemID=$item and BidderID=$user";
   $result = mysqli_query($db, $query);
   if($result){
    echo '<script>alert("Bidder is set as winner successfully!");
    location.href="dashboard.php";</script>';
   }else{
    echo '<script>alert("An error occured!");
    location.href="dashboard.php";</script>';
   }
 
?>