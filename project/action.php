<?php
include 'db.php';

//$data=$_POST;
//echo "<pre>";
var_dump($data);
$count=count($_POST['pid']);
    // $name= $_POST["name"];
	// $p = $_POST["phone"];
	// $address = $_POST["address"];
    // $pin= $_POST["pin"];
	// $city = $_POST["city"];


for($i=0; $i<$count ; $i++)
{
    $sql="INSERT INTO `pay`( `regid`, `product_id`,`status`,`product_name`,`cart_id`, `quantity`, `amount`,`charge`,`shoppayment`,`tax`,`tracking_id`,`purchased_date`,`address`,`name`,`phone_number`,`city`,`pin_number`,`reason`) VALUES
    ( '{$_POST['reg'][$i]}','{$_POST['pid'][$i]}','{$_POST['status'][$i]}','{$_POST['pd'][$i]}',
    '{$_POST['cid'][$i]}','{$_POST['quantity'][$i]}','{$_POST['amount'][$i]}','{$_POST['charge'][$i]}',
    '{$_POST['shoppay'][$i]}','{$_POST['tax'][$i]}','{$_POST['tracking_id'][$i]}',CURDATE() ,'{$_POST['address'][$i]}',
    '{$_POST['name'][$i]}','{$_POST['phone'][$i]}','{$_POST['city'][$i]}','{$_POST['pin'][$i]}','{$_POST['rs'][$i]}')";
    $con->query($sql);
    header("location:paymentgateway.php");
}
?>
