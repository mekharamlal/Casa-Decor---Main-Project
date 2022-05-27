<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
    
    
</head>
<body id="indx-bdy">

    <div class="navbar">
    <ul>
    <li class="list ">
                <a href="shopindex.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
           
            <li class="list active">
                <a href="product_shop_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">product</span>
                </a>
            </li>
          
            <li class="list">
                <a href="shop view.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Shop</span>
                </a>
            </li>
            <li class="list">
                <a href="sales.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Sales</span>
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
echo" <p class=welcome>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Welcome  ". $_SESSION["email"]."</p>";
    
}else{
    header("location:login.php");
}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

    <div class=addcategory>
    <a href=product_shop.php class=addpd><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Product</a>
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

</script><br>
<div class="mar">
    <?php
    include "db.php";
        $result=mysqli_query($con,"SELECT * FROM `product1` WHERE `shop`='$_SESSION[email]' ");
        $check = mysqli_num_rows($result)>0;
        if($check){
            ?>
            <div class="pdmss">
            <div class="tab1cardss1">
<?php            while($row=mysqli_fetch_array($result))
            {

            ?>
                            <div class="cardss">
                            <img src="product/<?php echo $row['product_image']; ?>" class="productviewindex" name="img"></img><br><br>
                            <h4 class="producttext" name="prdname"><?php echo $row['product_name']; ?></h4>
                            <p class="producttextprice" name="prdprice">$ <?php echo $row['product_price']; ?></p><br>
                            <a href="product_edit.php? edit=<?php echo $row['id']; ?>" class="editpd" >Edit</a>
                            <a href="product_delete.php? deleteid=<?php echo $row['id']; ?>" name="delete"class="deletepd" >Delete</a>
                           
            </form>
                            </div>
            <?php


                
            }
?>
</div>
        </div>
<?php 
        }
        else
        {
            echo"<marquee direction = right style=width:50%;margin-left:27% scrollamount=12><font color=red><h3>No product added yet!.</font></h3></marquee>";
        }
        
        
    ?>
      
      </div>

</body>

</html>