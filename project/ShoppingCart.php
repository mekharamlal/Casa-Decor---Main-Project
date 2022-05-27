<?php
session_start();
require_once "DBController.php";
//include "sider.php";
//   if(!isset($_SESSION['id'])){
//              header("location:Login.html");
//          }

if(isset($_SESSION["email"]))
{
    include "db.php";
          $lmail= $_SESSION["email"];


          $sqli = "select * from register where email = '$lmail' and status = 'user'";
          $resulti = mysqli_query($con,$sqli);
          $row = mysqli_fetch_array($resulti);

}

                           
$sql = "select * from register where email = '$lmail' and status = 'user' ";
$resulti = mysqli_query($con,$sql);
$row = mysqli_fetch_array($resulti);
$reg_id =  $row['regid'];

class ShoppingCart extends DBController
{

    function getAllProduct()
    {
        $query = "SELECT * FROM product1";
        
        $productResult = $this->getDBResult($query);
        return $productResult;
    }

    function getMemberCartItem($reg_id)
    {
        $query = "SELECT product1.*, cart.id as cart_id,cart.quantity FROM product1, cart WHERE 
            product1.id = cart.product_id AND cart.regid = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $reg_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function getProductByCode($product_code)
    {
        $query = "SELECT * FROM product1 WHERE product_code=?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $product_code
            )
        );
        
        $productResult = $this->getDBResult($query, $params);
        return $productResult;
    }

    function getCartItemByProduct($product_id, $reg_id)
    {
        $query = "SELECT * FROM cart WHERE product_id = ? AND regid = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $product_id
            ),
            array(
                "param_type" => "i",
                "param_value" => $reg_id
            )
        );
        
        $cartResult = $this->getDBResult($query, $params);
        return $cartResult;
    }

    function addToCart( $reg_id,$quantity,$product_id)
    {
        $query = "INSERT INTO cart (regid,product_id,quantity) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" =>$product_id
                
                
                
            ),
            array(
                "param_type" => "i",
                "param_value" =>  $reg_id
            ),
            array(
                "param_type" => "i",
                "param_value" =>  $quantity
            )
        );
        
        $this->updateDB($query, $params);
    }

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE cart SET  quantity = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function deleteCartItem($cart_id)
    {
        $query = "DELETE FROM cart WHERE id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function emptyCart($reg_id)
    {
        $query = "DELETE FROM cart WHERE regid = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $reg_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    
    
}
