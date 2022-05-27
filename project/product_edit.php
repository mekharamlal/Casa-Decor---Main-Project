<DOCTYPE html>
    <html>
    <head>
	<title>Edit Product </title>
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
                <a href="#">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list active">
                <a href="product_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Product</span>
                </a>
            </li>
            <li class="list">
                <a href="#">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Stock</span>
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
        <h4 class="overview">Edit Product</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>

      
<?php
include "db.php";
$id = $_GET["edit"];
$qr="SELECT  category.category_id,category.category_name,product1.cat_id,product1.product_name,product1.product_price,product1.product_quantity FROM category JOIN product1 ON(category.category_id=product1.cat_id and product1.id='$id')";
$q=mysqli_query($con,$qr);
$sql = mysqli_query($con,"select * from `product1` where id='$id'");
$row = mysqli_fetch_array($sql);
if(isset($_POST["sub"]))
{
	$pn= $_POST["pname"];
    $pp= $_POST["pprice"];
    $pq= $_POST["pqu"];
   $edit =  "UPDATE `product1` SET`product_name`='$pn',`product_price`='$pp',`product_quantity`='$pq' WHERE `id`='$id'";
   $result = mysqli_query($con,$edit);  
   header("location:product_view.php"); 
}


?>

<div class="productdiv">
<?php
    while($r=mysqli_fetch_array($q)){
?>
<form action="#" method="POST" enctype="multipart/form-data">
 
                <input type="text" name="pcid" placeholder="Category id" required id="pname" value="<?php echo $r['category_name'];?>">                 
                <input type="text" name="pname" placeholder="Product Name" required id="pname" value="<?php echo $r['product_name'];?>">
                <input type="text" name="pprice" placeholder="Product Price" required id="pname" value="<?php echo $r['product_price'];?>">
                <input type="text" name="pqu" placeholder="Product Quantity" required id="pname" value="<?php echo $r['product_quantity'];?>">
                <br><button class="prdbtn" type="submit" name="sub" > Update Product  </button>
               
</form>
<?php
    }
    ?>
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