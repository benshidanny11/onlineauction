<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: addlisting.php?err=1');
}
$userID = $_SESSION['userid'];


//if (isset($_POST["submit"])) {
    $target_dir = "img_dir/";
    // Get file path
    $target_file = $target_dir . basename($_FILES["PhotosID"]["name"]);
    // Get file extension
    $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Allowed file types
    $allowd_file_ext = array("jpg", "jpeg", "png");
   
    if (!file_exists($_FILES["PhotosID"]["tmp_name"])) {
        echo '<script>alert("Select image to upload.");window.location.href = "addlisting.php";</script>';
    } else if (!in_array($imageExt, $allowd_file_ext)) {

        echo '<script>alert("File type is not allowed.");window.location.href = "addlisting.php";</script>';
    } else if ($_FILES["PhotosID"]["size"] > 2097152) {
        echo '<script>alert("File is too large. File size should be less than 2 megabytes.");</script>';
    } else if (file_exists($target_file)) {
        echo '<script>alert("File already exists..");window.location.href = "addlisting.php";</script>';
    } else {
        if (move_uploaded_file($_FILES["PhotosID"]["tmp_name"], $target_file)) {

            if (isset($_POST['CategoryID'])) {
                $CategoryID = $_POST['CategoryID'];
            } else {
                $CategoryID = null;
            }
            if (isset($_POST['ItemName'])) {
                $ItemName = $_POST['ItemName'];
            } else {
                $ItemName = null;
            }
            if (isset($_POST['Description'])) {
                $Description = $_POST['Description'];
            } else {
                $Description = null;
            }
            if (isset($_POST['StartingPrice'])) {
                $StartingPrice = $_POST['StartingPrice'];
            } else {
                $StartingPrice = null;
            }
            if (isset($_POST['ExpectedPrice'])) {
                $ExpectedPrice = $_POST['ExpectedPrice'];
            } else {
                $ExpectedPrice = null;
            }
            if (isset($_POST['EndTime'])) {
                $EndTime = $_POST['EndTime'];
            } else {
                $EndTime = null;
            }


            $db = mysqli_connect('localhost', 'root', '', 'shop')
                or die('Error connecting to MySQL server.');

            $sql = "INSERT INTO item (CategoryID,ItemName,Description, PhotosID, StartingPrice, ExpectedPrice,currentPrice,EndTime,SellerID)VALUES ('$CategoryID','$ItemName','$Description', '$target_file', '$StartingPrice', '$ExpectedPrice','$StartingPrice', '$EndTime', '$userID') ";

            if ($db->query($sql) === TRUE) {
                echo '<script>alert("New product is added successfully");window.location.href = "index.php";</script>';
                //echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $db->error;
            }

            mysqli_close($db);


            
        }
    }
// }else{
//     echo "Not set";
// }
?>