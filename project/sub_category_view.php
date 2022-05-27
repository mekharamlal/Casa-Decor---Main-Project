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
            <li class="list ">
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
                    <span class="title">Category</span>
                </a>
            </li>
            <li class="list active">
                <a href="sub_category_view.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Sub Category</span>
                </a>
            </li>
            <li class="list ">
                <a href="product_view.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
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
        <h4 class="overview">Sub Category Details</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>

<div class=add_sub_category>
    <a href=sub_category.php class=addpd><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Sub category</a>
</div>
</div>
<?php
include "db.php";

?>

<table class="category_view" >
<tr>
    <th id="thtbl">Category id</th> 
    <th id="thtbl">Sub Category Name</th> 
    <th id="thtbl">Description</th>
   
     
    
</tr>

    <?php
    
        $result=mysqli_query($con,"SELECT *  FROM `sub_category`");
        while($row=mysqli_fetch_array($result))
        {
    ?>
        <tr id="tbclass">
        <td id="tdtbl"><center><?php echo $row["category_id"];?></td>
        <td id="tdtbl"><center><?php echo $row["sub_category_name"];?></td>
        <td id="tdtbl"><center><?php echo $row["sub_cat_description"];?></td>

        </tr>
        
      
    <?php
    
}
    ?>
</table>







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