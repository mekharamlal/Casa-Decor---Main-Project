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
                <a href="#">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list active">
                <a href="category_view.php">
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
        <h4 class="overview">ADD Product</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>
<div class="productdiv">

                <form action="product.php" method="POST" enctype="multipart/form-data">
                <select name="pcid" required id="pname">
                                        <span class="fa fa-user"></span>
                                            <option>--Select User Type--</option>
                                                <?php 
                                            include "db.php";  
                                            
                                            $records = mysqli_query($con, "SELECT * From category");  
                                    
                                            while($row = mysqli_fetch_array($records))
                                            {
                                                echo "<option value='". $row['category_id'] ."'>" .$row['category_name'] ."</option>";  
                                            }  
                            ?>
                                    </select>
						        <input type="text" name="pname" placeholder="Product Name" required id="pname">
                                <input type="text" name="pprice" placeholder="Product Price" required id="pname">
                                <input type="text" name="pqu" placeholder="Product Quantity" required id="pname">
                                <input type="text" name="shp" placeholder="Shop"value = <?php echo $_SESSION["email"]; ?> required id="pname">
                                <input type="file" name="img" style="width:428px;">
                                <input type="text" name="pc" placeholder="Product Code" required id="pname">
                                <br><button class="prdbtn" type="submit" name="submit" > Add Product  </button>
					</form>
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

<?php
include "db.php";
if(isset($_POST["submit"]))
{
    
    $ps= $_POST["pcid"];
	$pn= $_POST["pname"];
    $pp= $_POST["pprice"];
    $pq= $_POST["pqu"];
    $sh= $_POST["shp"];
    $pcc= $_POST["pc"];
    $img=$_FILES["img"]["name"];
    move_uploaded_file($_FILES["img"]["tmp_name"],"product/".$_FILES["img"]["name"]);

	
	$sql="INSERT INTO `product1`(`cat_id`, `product_name`, `product_price`, `product_quantity`, `product_image`, `shop`, `product_code`) 
	 VALUES('$ps','$pn','$pp','$pq','$img','$sh','$pcc')";
    echo $ps,$pn,$pp,$pq,$img;
    $res=mysqli_query($con,$sql);
		if($res)
		{
		echo "<script> alert('Wow! category Added. ')</script>"; 
		
		}else
		{
		echo "<script> alert('OOPS... Something Wrong. ')</script>"; 
		}

	header("location:product_view.php");
	
}
	?>

</body>

</html> 