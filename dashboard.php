<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin:: Dashboard</title>
    <?php include 'headeradmin.php'?>
</head>
<body>
<?php include 'headerad.php';?>


        <div class="grid_10">
        <div id="content">

<div class="container d-flex d-container">
  
    <div class="col-md-12 ">
    <div class="item">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Item image</th>
                <th scope="col">Item name</th>
                <th scope="col">Customer name</th>
                <th scope="col">Customer phone</th>
                <th scope="col">Customer address</th>
                <th scope="col">Starting price</th>
                <th scope="col">Current price</th>
                <th scope="col">Expected price</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
             <?php 
             $db = mysqli_connect('localhost','root','','shop')
             or die('Error connecting to MySQL server.'); 
             $query='SELECT * FROM `bids` INNER JOIN item on bids.ItemID=item.ItemID INNER JOIN user on bids.BidderID=user.UserID';
             $result = mysqli_query($db, $query);
             $row = mysqli_fetch_array($result);
      
                  $count=1;
				while($row = $result->fetch_assoc()) { 
          if($row['status']=="notwined"){
            echo '<tr>
            <th scope="row">'.$count.'</th>
             <td><img src='.$row['PhotosID'].' height="30" width="30"/></td>
             <td>'.$row['ItemName'].'</td>
             <td>'.$row['FName'].' '.$row['LName'].'</td>
             <td>'.$row['Contact_No'].'</td>
             <td>'.$row['Address'].'</td>
             <td>'.$row['StartingPrice'].'</td>
             <td>'.$row['CurrentPrice'].'</td>
             <td>'.$row['ExpectedPrice'].'</td>
           <td><a href="acceptbidder.php?bidder='.$row['BidderID'].'&itemno='.$row['ItemID'].'"><button class="btn btn-info stretched-link">Mark as winer</button></a></td>
          </tr>';
          }else{
            echo '<tr>
            <th scope="row">'.$count.'</th>
             <td><img src='.$row['PhotosID'].' height="30" width="30"/></td>
             <td>'.$row['ItemName'].'</td>
             <td>'.$row['FName'].' '.$row['LName'].'</td>
             <td>'.$row['Contact_No'].'</td>
             <td>'.$row['Address'].'</td>
             <td>'.$row['StartingPrice'].'</td>
             <td>'.$row['CurrentPrice'].'</td>
             <td>'.$row['ExpectedPrice'].'</td>
           <td>Winded</td>
          </tr>';
          }
			 
             $count++;
        }
              ?>
            </tbody>
          </table>
            </div>

    </div>
</div>

        </div>
</body>
</html>