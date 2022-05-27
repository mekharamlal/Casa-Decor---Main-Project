<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    
</head>
<body>
  <div class="admin_body">
    <div class="admin_nav">
        <ul>
            <li class="list active">
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
                <a href="category_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Category</span>
                </a>
            </li>
            <li class="list">
                <a href="product_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">product</span>
                </a>
            </li>
            <li class="list">
                <a href="admin_report.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Generate Report</span>
                </a>
            </li>
            <li class="list">
                <a href="order_details_admin.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list">
                <a href="shop view_admin.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Shop</span>
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
        <?php
session_start();
if($_SESSION["email"]){
echo"<p class=welcomeadmin> Welcome  ". $_SESSION["email"]."</p>";
    
//echo"<a href=user_details.php class=prof>complete profile</a>";
}else{
    header("location:login.php");
}

?>
        <h4 class="overview">Dashboard</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>


<div class="user_count">
<?php
include "db.php";
$sql = "SELECT regid  from register ORDER BY regid";
$result = mysqli_query($con, $sql) or die ("Query error!");
$row = mysqli_num_rows($result) ;
    echo " <p id=count_script>Total  Users &nbsp;&nbsp;&nbsp;&nbsp;
    <ion-icon name=people-outline id=count></ion-icon>
     <br>" .$row. "</p>";


?>
</div>

<div class="category_count">
<?php
include "db.php";
$sql = "SELECT `category_id`FROM `category`ORDER BY `category_id`";
$result1 = mysqli_query($con, $sql) or die ("Query error!");
$row1 = mysqli_num_rows($result1) ;
    echo " <p id=count_script>Total  Category &nbsp;&nbsp;&nbsp;&nbsp;
   <ion-icon name=pricetags-outline></ion-icon>
     <br>" .$row1. "</p>";
?>
</div>


<div class="sub_category_count">
<?php
include "db.php";
$sql = "SELECT regid FROM `register` WHERE `status`='shop' ";
$result1 = mysqli_query($con, $sql) or die ("Query error!");
$row1 = mysqli_num_rows($result1) ;
    echo " <p id=count_script>Total Shops &nbsp;
    <ion-icon name=people-outline id=count></ion-icon>
     <br>" .$row1. "</p>";
?>
</div>


<div class="product_count">
<?php
include "db.php";
$sql = "SELECT `id` FROM `product1` ORDER BY `id` ";
$result1 = mysqli_query($con, $sql) or die ("Query error!");
$row1 = mysqli_num_rows($result1) ;
    echo " <p id=count_script>Total Products &nbsp;
    <ion-icon name=pricetags-outline></ion-icon>
     <br>" .$row1. "</p>";
?>
</div>


<div class="order_count">
<?php
include "db.php";
$sql = "SELECT id  from pay ORDER BY id";
$result = mysqli_query($con, $sql) or die ("Query error!");
$row = mysqli_num_rows($result) ;
    echo " <p id=count_script>Total  Orders &nbsp;&nbsp;&nbsp;&nbsp;
    <ion-icon name=pricetags-outline></ion-icon>
     <br>" .$row. "</p>";


?>
</div>

</div>

<script>
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
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>