<?php
include "db.php";
$id = $_GET["deleteid"];
if(isset($_POST["delete"]))
{
   $dele = "DELETE FROM `category` WHERE `category_id`='$id'";
   $result = mysqli_query($con,$dele); 
   header("location:category_view.php");
   
}
?>


<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
    <body>
    <form action="#" method="POST" enctype="multipart/form-data">
                
                <br><button class="prdbtn" type="submit" name="delete" > Delete Category  </button>
</form>
</body>
</html>