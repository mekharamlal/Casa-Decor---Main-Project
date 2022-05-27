<?php
session_start();
include "db.php";
if(isset($_GET['action']) == "add"){
    $id = $_GET['id'];

    if(isset($_SESSION['mycart'][$id])){
        $previous = $_SESSION['mycart'][$id]['qty'];
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$previous+$_POST['quantity']);
    }
    else{
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$_POST['quantity']);
    }
    header("location:cart1.php");

}

?>
<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">   
</head>
<body id="indx-bdy">
<div class="index-container1">


<div class="navbar">
        <ul>
            <li class="list ">
                <a href="login.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="login.php">
                    <span class="icon"><ion-icon name="information-circle-outline"></ion-icon></span>
                    <span class="title">About</span>
                </a>
            </li>
            <li class="list">
                <a href="login.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Collection</span>
                </a>
            </li>
            <li class="list">
                <a href="login.php">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">profile</span>
                </a>
            </li>
            <li class="list">
                <a href="login.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Cart</span>
                </a>
            </li>

            
            <li class="list">
                <a href="login.php">
                    <span class="icon"><ion-icon name="log-in-outline"></ion-icon></span>
                    <span class="title">Login</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>
<br><br><br><br><br><br>
<h3 class="wlm"><b>WELCOME TO CASA DECOR</h3></b>
<p class="index-quotes1">
    
<i>“If you wait until you have enough money to decorate and make your <br>
home your own, it will never happen.If you wait until you can afford <br>
to buy everything new,you are missing the point. It is the old, thenew<br>
, the hand-me-down, the collected, the worn but loved things in your<br>
 home that make it your own.”</i>
</p>
<a href="login.php" class="buttonlgn" style="vertical-align:middle"><span class="spanlgn">Signin / Signup </span></a>  
<img src="img/bn.jpg"  class="ftr">
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


<?php
    include "db.php";
        $result=mysqli_query($con,"SELECT *  FROM `product1` LIMIT 7");
        $check = mysqli_num_rows($result)>0;
        if($check){
            ?>
            <div class="pdm_index">
            <div class="tab1cards">
<?php            while($row=mysqli_fetch_array($result))
            {

            ?>
                            <div class="card">
                                <form  action="login.php" method="POST" enctype="multipart/form-data">
                                    <img src="product/<?php echo $row['product_image']; ?>" class="productviewindex" name="img"></img><br><br>
                                    <h4 class="producttext" name="prdname"><?php echo $row['product_name']; ?></h4>
                                    <p class="producttextprice" name="prdprice">RS. <?php echo $row['product_price']; ?></p>
                                    <input type="number" name="quantity" value="1" min="1"class="qunt" max=<?php echo"$row[product_quantity]";?>>
                                    <input type="submit" name="btn_cart" class="addtocart" value="Add To Cart">
                                </form>
                            </div>
            <?php


                
            }
?></div>
</div>
<?php
        }
        else
        {
            echo"No product";
        }
        
        
    ?>
      
<br>
<footer>
  <p style="margin-left:-45%; font-size:30px;font-weight:20px;margin-top:2.5%;">CASA DECOR <div class="vl"></div></p>
  <p style="margin-left:65%;font-size:15px;margin-top:-3.5%;">CASA DECOR<BR>
+91 9074139799<br>
CASADECOR@GMAIL.COM</p>
</footer>
   


</body>

</html>