<!DOCTYPE html>
<html>
<head>
	<title>Login Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="user_detail">
    <?php session_start();
if($_SESSION["email"]){
include 'db.php';
$sid=$_SESSION["email"];
if(isset($_POST["submit"]))
{
   
    $fn= $_POST["fname"];
    $ln= $_POST["lname"];
	$phn = $_POST["phn"];
	$alt = $_POST["altphn"];
    $addre = $_POST["address"];
    $pin = $_POST["pin"];
    $city = $_POST["city"];
    mysqli_query($con,"UPDATE `user_detail` SET `first_name`='$fn',`last_name`='$ln',`phone_number`='$phn',
                            `alternate_phone_number`='$alt',`address`='$addre',`pin_number`='$pin',
                            `city`='$city' WHERE `email`='$sid'");
                            header("location:profile.php");
}
$edit=mysqli_query($con, "SELECT * FROM `user_detail` WHERE `email`='$sid'");
$row=mysqli_fetch_array($edit);   
    
    
    ?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e0dfe8" fill-opacity="1" d="M0,160L60,133.3C120,107,240,53,360,53.3C480,53,600,107,720,117.3C840,128,960,96,1080,112C1200,128,1320,192,1380,224L1440,256L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
</svg>
	<div class="user_detail-form">
			<div class="user_detail-main">
				<div class="user_detail-content">
					<h2>Details</h2><br>
					<form action="#" method="POST" style="margin-left:120px;" enctype="multipart/form-data">
                        <table>
                            <tr>
						        <td style="width:250px"><input type="text" name="fname" placeholder="First Name" required value="<?php echo $row["first_name"]; ?>"></td>
                                <td><input type="text" name="lname" placeholder="Last Name" required style="margin-left:40px;width:250px" value="<?php echo $row["last_name"]; ?>"></td>
                            </tr>
                            </table>
                                <input type="text" name="phn" placeholder="Phone Number" required style="width:545px" value="<?php echo $row["phone_number"]; ?>">
                                <input type="text" name="altphn" placeholder="Alternate Phone Number" required style="width:545px"value="<?php echo $row["alternate_phone_number"]; ?>">
								<input type="text" name="email" placeholder="Email" required style="width:545px" value="<?php echo $_SESSION["email"]; ?>">
                                
								
                                <input type="text" name="address" placeholder="Address" required style="width:545px;margin-left:0.5%;" value="<?php echo $row["address"]; ?>">
                                <input type="text" name="pin" placeholder="Pin Code" required style="width:545px"value="<?php echo $row["pin_number"]; ?>">
                                <input type="text" name="city" placeholder="City" required style="width:545px"value="<?php echo $row["city"]; ?>">
                                <br><button class="btn" type="submit" name="submit" style="width:545px"> Regiter  </button>
					</form>
				</div>
			</div>   
	</div>
</body>
</html>
<?php

}
?>
