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
					<form action="shop_profile.php" method="POST" style="margin-left:120px;" enctype="multipart/form-data">
                        <table>
                            <tr>
						        <td style="width:250px"><input type="text" name="sname" placeholder="Shop Name" required ></td>
                                <td><input type="text" name="city" placeholder="City" required style="margin-left:40px;width:250px"></td>
                            </tr>
                            </table>
                            <input type="text" name="district" placeholder="District" required style="width:545px">
                            <input type="text" name="state" placeholder="State" required style="width:545px">
                            <input type="text" name="pin" placeholder="Pin Code" required style="width:545px">
                            <input type="text" name="phn" placeholder="Phone Number" required style="width:545px">
                            <input type="text" name="email" placeholder="Email" required style="width:545px" value="<?php echo $_SESSION["email"]; ?>">			
                                
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
	$fn= $_POST["sname"];
    $city = $_POST["city"];
    $dis = $_POST["district"];
    $st = $_POST["state"];
	$phn = $_POST["phn"];
	$em = $_POST["email"];
    $pin = $_POST["pin"];
    $img=$_FILES["img"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"],"shop_profile/".$_FILES["img"]["name"]);
	mysqli_query($con,"INSERT INTO `shop_profile`( `name`, `city`, `district`, `state`, `pin`, `phone`, `mail`, `img`)
	 VALUES('$fn','$city','$dis','$st','$pin ','$phn','$em','$img')");
	header("location:shop view.php");
	
}
}
	?>
