<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        /* typography */

html {
    background: #d5d6d8;
}

table {
  border-collapse: collapse;
  margin-bottom:5%;
  font-family: 'helvetica neue', helvetica, arial, sans-serif;
}

td, th {
  border: 1px solid #999;
  padding: 0.5rem;
  text-align: left;
}
th{
    background-color:#dfd3c5;
    align-items: center;
}
</style>
</head>
<body>
 
    <div class="admin_nav">
        <ul>
            <li class="list ">
                <a href="admin.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
            <li class="list active">
                <a href="userdetails.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">User Details</span>
                </a>
            </li>
            <li class="list">
                <a href="order_details_admin.php">
                    <span class="icon"><ion-icon name="cart-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list">
                <a href="category_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">Category</span>
                </a>
            </li>
            
            <li class="list">
                <a href="admin_report.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Generate Report</span>
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
        <h4 class="overview">Users Details</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>



<?php
include "db.php";

?>

<table  border="1"class="userdetailtable" >
<tr>
    <th>Shop Id</th> 
    <th>Image</th> 
    <th>First Name</th>
    <th>Last Name</th>
    <th>Alternate Phone Number</th>
    <th>phone Number</th>
    <th>Gender</th>
    <th>Address</th>  
    <th>Pin Number</th>
    <th>City</th>  
    <th>Email</th>   
    <th>ACTION</th>  
    
</tr>

    <?php
    if($_SESSION["email"]){
        $result=mysqli_query($con,"SELECT * FROM `user_detail` ORDER BY `id`");
        while($row=mysqli_fetch_array($result))
        {
    ?>
        <tr>
        <td id="tdtbl"><center><?php echo $row["id"];?></td>   
        <td><img src="profiles/<?php echo $row["img"];?>"class="pf-img_admin"></img></td>
        <td><?php echo $row["first_name"];?></td>
        <td><?php echo $row["last_name"];?></td>
        <td><?php echo $row["phone_number"];?></td>
        <td><?php echo $row["alternate_phone_number"];?></td>
        <td><?php echo $row["gender"];?></td>
        <td><?php echo $row["address"];?></td>
        <td><?php echo $row["pin_number"];?></td>
        <td><?php echo $row["city"];?></td>
        <td><?php echo $row["email"];?></td>
        <td><a href="delete_user.php? mid=<?php echo $row["id"];?> ">Delete</a></td>

        </tr>
        
      
    <?php
    }
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