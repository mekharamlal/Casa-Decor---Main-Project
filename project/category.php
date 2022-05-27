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
                    <span class="title">Category </span>
                </a>
            </li>
           
            <li class="list ">
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


<div class=addcategory>
    <a href=category_view.php class=addpd><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;View category</a>
</div>


<div class="productdiv">
                    <form action="category.php" method="POST" enctype="multipart/form-data">
                                 <input type="text" name="pname" placeholder="Category Name" required id="pid">
                                <textarea name="cat-desc" placeholder="Category description" required ></textarea>
                                <br><button class="prdbtn" type="submit" name="submit" > Add Category  </button>
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
	$pn= $_POST["pname"];
    $cd= $_POST["cat-desc"];

	
	$sql="INSERT INTO `category`( `category_name`, `description`)
	 VALUES('$pn','$cd')";

    $res=mysqli_query($con,$sql);
		if($res)
		{
		echo "<script> alert('Wow! category Added. ')</script>"; 
		
		}else
		{
		echo "<script> alert('OOPS... Something Wrong. ')</script>"; 
		}




	header("location:category_view.php");
	
}
	?>

</body>

</html>