<?php
session_start();
$amt = $_SESSION['tp'];
require('stripe-php-master/config.php');
if(isset($_POST['stripeToken'])){
	\Stripe\Stripe::setVerifySslCerts(false);

	$token=$_POST['stripeToken'];

	$data=\Stripe\Charge::create(array(
		"amount"=>"$amt",
		"currency"=>"inr",
		"description"=>"Madayikkal Poultries Payment",
		"source"=>$token,
	));
}
?>