<?php
include 'db.php';
$sid=$_GET["mid"];
//$delete=mysqli_query($con,"DELETE FROM `register` WHERE `id`='$sid' ");
$delete=mysqli_query($con,"DELETE FROM `user_detail` WHERE `id`='$sid' ");
if($delete)
    {
        header("location:userdetails.php");
    }
?>

