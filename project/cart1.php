<?php
include "db.php";
session_start();
if(isset($_GET['remove']))
{
$iid=$_GET['remove'];
unset($_SESSION['mycart'][$iid]);
header("location:cart1.php");

}

?>

<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Menu</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body id="indx-bdy">

<div class="navbar">
        <ul>
            <li class="list">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="about.php">
                    <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                    <span class="title">About</span>
                </a>
            </li>
            <li class="list">
                <a href="product_gallery.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Collection</span>
                </a>
            </li>
            <li class="list">
                <a href="profile.php">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">profile</span>
                </a>
            </li>
            <li class="list  active">
                <a href="cart1.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Cart</span>
                </a>
            </li>

            
            <li class="list">
                <a href="logout.php">
                    <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="crt_sess">
    <?php

if($_SESSION["email"]){
echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>";

}else{
    header("location:login.php");
}

?>
 <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

</div>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


<script>

let menuToggle=document.querySelector('.toggle');
let navbar=document.querySelector('.navbar');
menuToggle.onclick=function(){
    menuToggle.classList.toggle('active');
    navbar.classList.toggle('active');
}


//add active class in selected list item.
let list=document.querySelectorAll('.list');
for(let i=0;i<list.length;i++){
    list[i].onclick=function(){
        let j=0;
        while(j<list.length){
            list[j++].className='list';
        }
        list[i].className='list active';
    }
}

</script>
   

<!---------- Home Section starts ------------>
<center><h3 id="ct"><b>Cart</h3></b> <a href="paymentgateway.php" class="buttonpur" style="vertical-align:middle"><span class="spanpur">Checkout</span></a>

<br>         
            <table class="tablec">
                
                    <tr>
                        <th >Product Image</th>
                        <th >Product Name</th>
                        <th >Price</th>
                        <th >Quantity</th>
                        <th >Amount</th>
                        
                        <th> </th>
                    </tr>


                <tbody>
                <?php
    if($_SESSION["email"]){
        $id=$_SESSION["email"];
        $rs=mysqli_query($con,"SELECT regid from register where email='$id'");
        $row1=mysqli_fetch_array($rs);
        $iid=$row1['regid'];
        $result=mysqli_query($con,"SELECT product1.id,product1.product_image,product1.product_name,product1.product_price,cart.quantity from product1 join cart on product1.id=cart.product_id and cart.regid='$iid'");
        while($row=mysqli_fetch_array($result))
        {
    ?>
        <tr>
         
        <td><img src="product/<?php echo $row["product_image"];?>"class="pf-img_admin"></img></td>
        <td><?php echo $row["product_name"];?></td>
        <td><?php echo $row["product_price"];?></td>
        <td><?php echo $row["quantity"];?></td>
        <td><?php echo $row["product_price"]*$row["quantity"];?></td>
       

        </tr>
        
      
    <?php
    }
}
    ?>
                </tbody>

            </table>
            <h3 class="ttl">Total Amount : </h3>
           

</center>
        


</body>
</html> 
