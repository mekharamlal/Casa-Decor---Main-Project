<?php
session_start();
require_once "DBController.php";
?>

<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
     <!-- Jquery CDN -->
     <script src="./bootstrap-4.5.3-dist/js/jquery-3.5.1.js"></script>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="./bootstrap-4.5.3-dist/css/bootstrap.css">
    <script src="./bootstrap-4.5.3-dist/js/bootstrap.js"></script>
    <link href="./Fonts/Montserrat-SemiBold.ttf" rel="stylesheet">
    <!-- Font -->
    <!-- written javascript -->
    <script src="./script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" />
    </script>
    <link rel="stylesheet" ref="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js">
    </script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    
</head>
<body id="index-body">
<div class="profile-container">
<?php
    include 'db.php';
if($_SESSION["email"]){
echo"<p class=welcome style=margin-top:-7%;> Welcome  ". $_SESSION["email"]."</p>";
}
$self=$_SESSION["email"];
?>
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
            
            <li class="list active">
                <a href="shopping.php">
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
    
    
    <div class="toggle">
    <ion-icon name="menu-outline" class="open"> </ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
    </div>

    <form action="action.php" method="POST">
<?php
    if($_SESSION["email"]){
        $id=$_SESSION["email"];
        $rs=mysqli_query($con,"SELECT regid from register where email='$id'");
        $row1=mysqli_fetch_array($rs);
        $iid=$row1['regid'];
        $result=mysqli_query($con,"SELECT product1.id,product1.product_image,product1.product_name,product1.product_price,cart.id as cid ,cart.quantity from product1 join cart on product1.id=cart.product_id and cart.regid='$iid'");
        $result2=mysqli_query($con,"SELECT `first_name`,`last_name`,`phone_number`,`address`,`pin_number`,`city` FROM `user_detail` WHERE email='$id'");
        $row2=mysqli_fetch_array($result2);
        echo"<h3 style=margin-left:45%;>Confirm Order</h3>";
    ?>
    
    <table class="address_tbl">
        <tr>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th>Product Price</th>
            <th>Tax</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Address</th>
            <th>Pin Number</th>
            <th>City</th>
        </tr>
        
    <?php
        while($row=mysqli_fetch_array($result))
        {
            $total=0;
            
    ?>
    
    <tr>
        <input type="hidden" name="reg[]" value="<?php echo $row1["regid"];?>" style="height:10%;width:30%;">
        <input type="hidden" name="pid[]" value="<?php echo $row["id"];?>">
        <input type="hidden" name="cid[]" value="<?php echo $row["cid"];?>">
        <input type="hidden" name="tracking_id[]" value="<?php echo(rand() );?>">
        <input type="hidden" name="charge[]" value="<?php echo ($row["product_price"]*$row["quantity"])/8;?>">
        <input type="hidden" name="shoppay[]" value="<?php echo ($row["product_price"]*$row["quantity"])-(($row["product_price"]*$row["quantity"])/8);?>">
        <input type="hidden" name="status[]" value="<?php echo 'purchased';?>">
        <input type="hidden" name="rs[]" value="<?php echo 'nil';?>">

        <td><input type="text" class="new_txt" name="pd[]" value="<?php echo $row["product_name"];?>" readonly></td>
        <td><input type="text" class="new_txt" name="quantity[]"value="<?php echo $row["quantity"];?>"readonly></td>
        <td><input type="text" class="new_txt" name="amount[]"value="<?php echo $row["product_price"]*$row["quantity"];?>" readonly></td>
        <td><input type="text" class="new_txt" name="tax[]"value="<?php echo '10';?>" readonly></td>

        <td><input type="text" class="new_txt" name="name[]" value="<?php echo $row2["first_name"]; echo " "; echo $row2["last_name"];?>"></td>
        <td><input type="text" class="new_txt" name="phone[]" value="<?php echo $row2["phone_number"]; ?>"></td>
        <td><input type="text" class="new_txt" name="address[]" value="<?php echo $row2["address"]; ?>"></td>
        <td><input type="text" class="new_txt" name="pin[]" value="<?php echo $row2["pin_number"]; ?>"></td>
        <td><input type="text" class="new_txt" name="city[]" value="<?php echo $row2["city"]; ?>"></td>

        </tr> 
    <?php
    }
   
    ?>
  
    </form> 
    
        <?php
}
?>
  <input type="submit" name="submit" class="submit_confirm" placeholder="Proceed To Pay" >
   



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

<script>
$('document').ready(function(){
    $('#py_btn').click(function(e){
        e.preventDefault;

    })
});
    </script>



</div>
</body>

</html>