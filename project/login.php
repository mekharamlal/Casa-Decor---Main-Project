<!DOCTYPE html>
<html>
<head>
	<title>Login Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style>

#login_shop{
           text-decoration: none; 
		   color:blueviolet;
		   font-size:large;
		   margin-left: 31%;
	      
        }
        #login_shop:hover{
            color: black;
        }
		

</style>
</head>
<body id="lg">
	<div class="login-form">
			<div class="main">
				<div class="form-img">
					<img src="img/log.svg">
					<span class="txt1">Welcome to Casa Decor</span><br>
					<a href="register.php" class="button1" style="vertical-align:middle"><span class="span1">Sign Up  </span></a>
				</div>
				<div class="content"><br><br>
					<h2>LOG IN</h2>
					<br>
					<form action="#" method="POST">
						<input type="email" name="email" placeholder="Email ID" required >
						<input type="password" name="pass" placeholder="user Password" required ><br><br>
						<button class="btn" type="submit" name="submit"> Login  </button>
					</form>
						<p class="account"> <a href="forget.php">Forget Password?</a></p><br>
						<!--<a href="shop_login.php" id="login_shop">LOGIN AS SHOP</a>	<br><br> -->
				</div>
			</div>
	</div>
</body>
</html>
<?php
session_start();
if(isset($_POST["submit"]))
{
include "db.php";
$name=$_POST['email'];
$pass=$_POST['pass'];
$sql="SELECT `email`,`pass`,`status` FROM `register` WHERE `email`='$name' AND `pass`='$pass' AND `status` IN ('shop')";
$result= mysqli_query($con,$sql);

$sql_user="SELECT `email`,`pass`,`status` FROM `register` WHERE `email`='$name' AND `pass`='$pass' AND `status` IN ('user')";
$result_user= mysqli_query($con,$sql_user);

$_SESSION["email"]=$name;

if($result ->num_rows >0)
{
	if($result)
	{
		header("Location: shopindex.php");	
	}	
}
else if(($name=="admin@gmail.com")&&($pass=="admin"))
{
	header("Location: admin.php");	
}
else if($result_user)
{
		header("Location: index.php");		
}

		
		else
 			{
				echo"<font color=red><h3>Username/password is incorrect.</font></h3>";
			}
}


?>

