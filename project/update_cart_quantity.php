<?php
require_once "ShoppingCart.php";
$reg_id=$row['regid'];
$shoppingCart= new ShoppingCart();
$shoppingCart->updateCartQuantity($_POST["new_quantity"],$_POST["cart_id"]);
?>