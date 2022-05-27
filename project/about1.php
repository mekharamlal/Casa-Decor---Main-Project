<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
    
    
</head>
<body id="indx-bdy">
<div class="index-container">
    <div class="navbar">
        <ul>
            <li class="list active">
                <a href="#">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
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
            <li class="list">
                <a href="cart.php">
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
    <br><br>
    <?php
session_start();
if($_SESSION["email"]){
echo"<p class=welcome> Welcome  ". $_SESSION["email"]."</p>";
    
echo"<a href=user_details.php id=prof>complete profile</a>";
}else{
    header("location:login.php");
}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
<br><br><br><br><br><br>
<h3><b>Ride in Style</h3></b>
<p class="index-quotes">
    
<i>“If you wait until you have enough money to decorate and make your <br>
home your own, it will never happen.If you wait until you can afford <br>
to buy everything new,you are missing the point. It is the old, thenew<br>
, the hand-me-down, the collected, the worn but loved things in your<br>
 home that make it your own.”</i>
</p>
<img src="img/bn.jpg"  class="ftr">
</div>
<div class="best_seller">Best Sellers</div>



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

    <?php
    include "db.php";
        $result=mysqli_query($con,"SELECT *  FROM `product`");
        $check = mysqli_num_rows($result)>0;
        if($check){
            ?>
            <div class="tab1cards">
<?php            while($row=mysqli_fetch_array($result))
            {

            ?>
                            <div class="card"><form  action="cart.php?action=addid=<?php echo $row['id']?>" method="POST" enctype="multipart/form-data">
                            <img src="product/<?php echo $row['product_image']; ?>" class="productviewindex" name="img"></img><br><br>
                            <h4 class="producttext" name="prdname"><?php echo $row['product_name']; ?></h4>
                            <?php echo $row['id'];?>
                            <p class="producttextprice" name="prdprice">$ <?php echo $row['product_price']; ?></p>
                            <input type="number" name="quantity" value="1" class="qunt">
                            <input type="submit" name="add_t0_cart" class="addtocart" value="Add To Cart">
            </form>
                            </div>
            <?php


                
            }
?></div>
<?php
        }
        else
        {
            echo"No product";
        }
        
        
    ?>
      


</body>

</html>