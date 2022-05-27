<?php
include "db.php";
if(isset($_POST["submit"]))
{
    $id = $_GET["pay"];

    $pid= $_POST["pay_id"];
    $em= $_POST["email"];
    $pname= $_POST["product_name"];
    $pq= $_POST["quantity"];
    $name= $_POST["name"];
    
	$pprice= $_POST["product_price"];
    $pt= $_POST["total"];
    //$address= $_POST["address"];
    
	
	$sql="INSERT INTO `shop_product_purchased`( `payment_id`, `shop`, `product_name`, `product quantity`, `product_price`, `Total`, `customer_name`) 
    VALUES('$pid,'$em','$pname','$pq','$pprice','$pt','$name')";
    echo $pid,$em,$pname,$pq,$pprice,$pt,$name;
    $res=mysqli_query($con,$sql);
		if($res)
		{
		echo "<script> alert('payment Sucessfull. ')</script>"; 
		
		}else
		{
		echo "<script> alert('OOPS... Something Wrong. ')</script>"; 
		}

	header("location:order_details_admin.php");
	
}
	?>