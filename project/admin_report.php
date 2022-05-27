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
            <li class="list active">
                <a href="admin_report.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Generate Bill</span>
                </a>
            </li>
            <li class="list">
                <a href="shop view_admin.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Shop</span>
                </a>
            </li>
            <li class="list">
                <a href="order_details_admin.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
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
        <h4 class="overview">Report Generation</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>



<div class="shop_bill">
    <br><br><br><center>
<a href="shop-report.php" class="shop-link" style="margin-left:2%; ">SHOP </a>
</div>
<div class="userdetail_bill">
    <br><br><br><center>
<a href="user_details-bill.php" class="shop-link" style="margin-left:2%; ">USER</a>
</div>
<div class="product_bill">
    <br><br><br><center>
<a href="product-bill.php" class="shop-link" style="margin-left:2%; ">PRODUCT</a>
</div>
<div class="order_bill">
    <br><br><br><center>
<a href="order-bill.php" class="shop-link" style="margin-left:2%; ">ORDER</a>
</div>
<p class="shop-details"> #Shop Details</p>
<p class="user-details"> #User Details</p>
<p class="product-details"> #Product Details</p>
<p class="order-details"> #Order Details</p>
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