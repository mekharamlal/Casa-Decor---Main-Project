<?php
session_start();
unset($_SESSION["email"]);
header("location:shop_login.php");
?>