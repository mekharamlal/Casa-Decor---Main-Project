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
include 'db.php';
$sid=$_GET["editid"];
if(isset($_POST["submit"]))
{
    $pn= $_POST["pname"];
    $cd= $_POST["cat-desc"];
mysqli_query($con,"UPDATE `category` SET `category_name`='$pn',`description`='$cd' WHERE `category_id`='$sid'");
}
$edit=mysqli_query($con, "SELECT * FROM `category` WHERE `category_id`='$sid'");
$row=mysqli_fetch_array($edit);
?>

<div class="productdiv">
<form action="#" method="POST" >    
<?php echo " $sid";?>          
                <input type="text" name="pname" placeholder="Category Name" required id="pname" value="<?php echo $row[`category_name`];?>">
                <input type="text" name="cat-desc" placeholder="Category Description" required id="pname" value="<?php echo $row[`description`];?>">
                <br><button class="prdbtn" type="submit" name="submit" > Update Category  </button>
               
</form>
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