<?php

function registration($categoryName)
{
 $db = mysqli_connect('localhost','root','','shop');
 $query="SELECT CategoryID FROM  category where Category='$categoryName'";

 $result = mysqli_query($db, $query);
 
 if (mysqli_num_rows($result) != 1)
 {

   
 }

}

?>
