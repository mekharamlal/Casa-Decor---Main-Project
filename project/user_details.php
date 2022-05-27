<!DOCTYPE html>
<html>
<head>
	<title>Login Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body id="user_detail"><?php session_start();
if($_SESSION["email"]){?>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#e0dfe8" fill-opacity="1" d="M0,160L60,133.3C120,107,240,53,360,53.3C480,53,600,107,720,117.3C840,128,960,96,1080,112C1200,128,1320,192,1380,224L1440,256L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
</svg>
	<div class="user_detail-form">
			<div class="user_detail-main">
				<div class="user_detail-content">
					<h2>Details</h2><br>
					<form action="user_details.php" method="POST" style="margin-left:120px;" enctype="multipart/form-data">
                        <table>
                            <tr>
						        <td style="width:250px"><input type="text" name="fname" placeholder="First Name" required ></td>
                                <td><input type="text" name="lname" placeholder="Last Name" required style="margin-left:40px;width:250px"></td>
                            </tr>
                            </table>
                                <input type="text" name="phn" placeholder="Phone Number" required style="width:545px">
                                <input type="text" name="altphn" placeholder="Alternate Phone Number" required style="width:545px">
								<input type="text" name="email" placeholder="Email" required style="width:545px" value="<?php echo $_SESSION["email"]; ?>">
                                <div class="radio-inline">
									<div class="left-radio">
									<input type="radio" name="gender" id="radio-male"value="Male" > <span class="txtm">Male</span>
									</div>
									<div class="right-radio">
                                	<input type="radio" name="gender" id="radio-female"value="Female" ><span class="txtf">Female</span>
									</div>
								</div>
								
                                <textarea name="address" placeholder="Address" required style="width:545px;margin-left:0.5%;"></textarea>
                                <input type="text" name="pin" placeholder="Pin Code" required style="width:545px">
                                <input type="text" name="city" placeholder="City" required style="width:545px">
                                <input type="file" name="img" style="width:545px;">
                                <br><button class="btn" type="submit" name="submit" style="width:545px"> Regiter  </button>
					</form>
				</div>
			</div>   
	</div>
</body>
</html>
<?php
include "db.php";

if(isset($_POST["submit"]))
{
	$fn= $_POST["fname"];
    $ln= $_POST["lname"];
	$phn = $_POST["phn"];
	$em = $_POST["email"];
	$alt = $_POST["altphn"];
    $gen = $_POST["gender"];
    $addre = $_POST["address"];
    $pin = $_POST["pin"];
    $city = $_POST["city"];
    $img=$_FILES["img"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"],"profiles/".$_FILES["img"]["name"]);
	mysqli_query($con,"INSERT INTO `user_detail`(`first_name`, `last_name`, `phone_number`, `alternate_phone_number`, `gender`, `address`, `pin_number`, `city`, `img`, `email`)
	 VALUES('$fn','$ln','$phn','$alt','$gen ','$addre','$pin','$city','$img','$em')");
	header("location:index.php");
	
}
}
	?>
