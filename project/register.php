<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>
function validate_pass()
            {
                var password=document.myform.pass.value; 
                var pname=document.forms["reg_form"]["pass"];
                if(password.length<6)
                {
                    var error="Password must be at least 6 characters long.";
                    document.getElementById("pass_err").innerHTML=error;
                    pname.focus;
                    return false;
                }
                else
                {
                    document.getElementById("pass_err").innerHTML="";
                    document.myform.cpass.focus;
                    return true;
                }

            }
</script>
</head>
<body id="lg">
	<div class="login-form">
			<div class="main">
				<div class="form-img">
                    <img src="img/log.svg">
                    <span class="txt1">Welcome to Casa Decor </span><br>
                    <a href="login.php" class="button1"  style="vertical-align:middle"><span class="span1">Sign In </span></a>
				</div>
				<div class="content"><br><br>
					<h2>Create Account</h2>
					<form action="register.php" method="POST" name="reg_form">
                        <input type="email" name="email" placeholder="Email ID" required >
                        <input type="password" name="pass" placeholder="Password "onblur="validate_pass()" required >
							<h5 style="color:red";> <p id="pass_err"></p></h5>
						<input type="password" name="cpass" placeholder="Confirm Password" required ><br><br>
						<button class="btn" type="submit" name="submit"> SignUp </button><br><br><br><br>
					</form>
						
				</div>
			</div>
	</div>
</body>
</html>

<?php
session_start();
include "db.php";
if(isset($_POST["submit"]))
{
	$name= $_POST["email"];
	$p = $_POST["pass"];
	$c = $_POST["cpass"];
	$st="user";
	$query = "SELECT `email` FROM `register` WHERE email = '$name' ";
     $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result)>0)
            {
				$_SESSION["email"]=$name;
				echo "<script> alert('Oops Email already exists.. ')</script>"; 
        	}
		else{
	if($p == $c)
	{
		$sql="INSERT INTO `register`(`email`, `pass`, `cpass`,`status`) 
		VALUES ('$name','$p','$c','$st')";
		$res=mysqli_query($con,$sql);
		if($res)
		{
		echo "<script> alert('Wow! User Registeration Completed. ')</script>"; 
		header("Location: login.php");	
		
		}else
		{
		echo "<script> alert('OOPS... Something Wrong. ')</script>"; 
		}
	}else
	{
		echo "<script> alert('Password not Mached. ')</script>";
	}
	}
}
?>
