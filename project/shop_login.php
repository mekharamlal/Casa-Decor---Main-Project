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
		   margin-left: 24%;
	      
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
					<form action="shop_login.php" method="POST">
						<input type="email" name="email" placeholder="Email ID" required >
						<input type="password" name="pass" placeholder="user Password" required ><br><br>
						<button class="btn" type="submit" name="submit1"> Login  </button>
					</form>
						<p class="account"> <a href="forget.php">Forget Password?</a></p><br>
						 <a href="login.php" id="login_shop">LOGIN AS CUSTOMER</a>	<br><br>
				</div>
			</div>
	</div>
</body>
</html>
<?php
session_start();
include 'db.php';

if(isset($_POST["submit1"]))
{
$name = $_POST['email']; /* prevents a bit of SQL injection */
$password = $_POST['pass']; /* prevents a bit of SQL injection */
$_SESSION["email"]=$name;
$qryshop=mysqli_query($con,"SELECT * FROM register WHERE email='$name' AND pass='$password' AND status='shop'");
if(mysqli_num_rows($qryshop)==1){
	echo "<script>window.location.href='shopindex.php';</script>";
    exit;
}
else {
echo "Error! No user found.";
}
}

?>



















