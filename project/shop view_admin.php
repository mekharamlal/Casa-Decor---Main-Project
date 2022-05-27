<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
</head>
<body>
  <div class="admin_body" style="height:100%;">
    <div class="admin_nav">
        <ul>
            <li class="list">
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
                <a href="product_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">product</span>
                </a>
            </li>
            <li class="list">
                <a href="order_details_admin.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Order Details</span>
                </a>
            </li>
            <li class="list active">
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
        <h4 class="overview" style="padding-left:24px">Shop</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>


<div class=addcategory>
    <a href=addshop.php class=addpd><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Add Shop</a>
</div>
</div>
<?php
include "db.php";
?>

<table class="category_view" >
<tr>
    <th id="thtbl">Shop Id</th> 
    <th id="thtbl">Shop User Name</th>
    <th id="thtbl">Shop password</th>
    <th id="thtbl">Send Login Details<br>
        <span class="material-icons" >
        contact_mail
        </span>
    </th>
     
    
</tr>

    <?php
        $result=mysqli_query($con,"SELECT * FROM `register`WHERE `status`='shop'");
        while($row=mysqli_fetch_array($result))
        {
    ?><form action='#' method=post>
        <tr id="tbclass">
      
        <td id="tdtbl"><center><?php echo $row["regid"];?></td>
        <td id="tdtbl"><center><?php echo $row["email"];?></td>
        <td id="tdtbl"><center><?php echo $row["pass"];?></td>
        <td style="text-align:center;">
            <input type="submit" style="background:grey;color:white;padding:8px 10px; width:47%;border-radius:3px;" value='<?php echo $row["email"];?>' name="compose">
        </td>
        </tr>
        
        </form>
    <?php
    
}
    ?>
</table>
</div>
<?php

if(isset($_POST["compose"]))
{
  $id = $_POST["compose"];
  $subject="Login Details"; 
  $message= 'Welcome to CASA DECOR';
  $login_details="Your Login details are sending through this mail.";
  echo ("<script LANGUAGE='JavaScript'>
  window.open('https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=$id&Subject=$subject&body=$message,$login_details', '_blank');
  </script>");

 
}
?>
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