<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body id="index-body">

    <div class="navbar">
        <ul>
            <li class="list ">
                <a href="index.php">
                    <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                    <span class="title">Home</span>
                </a>
            </li>
            <li class="list">
                <a href="abot.php">
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
                <a href="shopping.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Cart</span>
                </a>
            </li>
            <li class="list active">
                <a href="order.php">
                    <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                    <span class="title">Order</span>
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
if($_SESSION["email"])
{
    include "db.php";
    $self=$_SESSION["email"];  
    echo"<p class=welcome_profile> Welcome  ". $_SESSION["email"]."</p>";
    
    

}

?>
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
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
<div class="ordr">
<h3>Ordered Products</h3>
</div>

                <?php
    if($_SESSION["email"]){
        $id=$_SESSION["email"];
        $rs=mysqli_query($con,"SELECT regid from register where email='$id'");
        $row1=mysqli_fetch_array($rs);
        $iid=$row1['regid'];
        $result=mysqli_query($con,"SELECT product1.id,product1.product_image,product1.product_name,product1.product_price,pay.quantity,pay.id,pay.name,pay.tax,pay.address,pay.status,pay.id as payid,pay.city,pay.pin_number from product1 join pay on product1.id=pay.product_id and pay.regid='$iid' where pay.status='purchased'");
       ?>
       <form action="cancel_order.php" method="POST">
       <table class="tableorder" style="margin-left: 25%;align-items:center;">
                
                <tr>
                    <th >Product Image</th>
                    <th >Product Name</th>
                    <th >Price</th>
                    <th >Quantity</th>
                    <th >Paid Amount</th>
                    <th >Status</th>
                    
                    <th> </th>
                </tr>


            <tbody><?php
       
        while($row=mysqli_fetch_array($result))
        {
    ?>
    
        <tr>
         
        <td><img src="product/<?php echo $row["product_image"];?>"class="pf-img_admin"></img></td>
        <td><?php echo $row["product_name"];?></td>
        <td><?php echo $row["product_price"];?></td>
        <td><?php echo $row["quantity"];?></td>
        <td><?php echo ($row["product_price"]*$row["quantity"])+$row["tax"];?></td>
        <td style="color:green;">Purchased</td>
        <td><a href="cancel_order.php? edit=<?php echo $row['id']; ?>" class="editpd" >Cancel Order</a></td>
        

        </tr>
        
      
    <?php
    }
    $result3=mysqli_query($con,"SELECT `amount` FROM `pay` WHERE `regid`='$iid'  ");
    $check = mysqli_num_rows($result3)>0;
    if($check){
    $total=0;
       while($row3=mysqli_fetch_array($result3))
         {
             $total +=$row3['amount'];
   
        }?>
        <?php
        }
        else
        {?>
            <div style="color:red; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:20px; margin-left:45%;margin-top:5%;">No Products Ordered Yet !!</div>
       <?php }
        
}
    ?>
                </tbody>

            </table><br><br><br><br><br><br><br><br><br><br><br><br>
       </form>
           

</center>
        

</body>

</html>