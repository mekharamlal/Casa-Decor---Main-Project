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
                <a href="admin.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="list">
                <a href="userdetails.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">User Details</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list ">
                <a href="category_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Category </span>
                </a>
            </li>
            <li class="list ">
                <a href="shop view_admin.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Shop </span>
                </a>
            </li>
            <li class="list active">
                <a href="product_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Product </span>
                </a>
            </li>
            <li class="list">
                <a href="admin_report.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Generate Report</span>
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
    
}else{
    header("location:login.php");
}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

    <div class=addcategory>
    <a href=product.php class=addpd><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Product</a>
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

</script><br><br><br><br><br><br><br><br><br>
<div class="mar1">
    <?php
    include "db.php";
        $result=mysqli_query($con,"SELECT *  FROM `product1`");
        $check = mysqli_num_rows($result)>0;
        if($check){
            ?>
            <div class="tab1cards5">
<?php            while($row=mysqli_fetch_array($result))
            {

            ?>
                            <div class="card">
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
<?php 
        }
        else
        {
            echo"No product";
        }
        
        
    ?>
      
      </div>

</body>

</html>