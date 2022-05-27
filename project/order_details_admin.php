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
            <li class="list">
                <a href="userdetails.php">
                    <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
                    <span class="title">User Details</span>
                </a>
            </li>
            <li class="list active">
                <a href="#">
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
        <h4 class="overview">Order Details</h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>

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
include 'db.php';
    if($_SESSION["email"]){
        $id=$_SESSION["email"];
        $rs=mysqli_query($con,"SELECT regid from register where email='$id'");
        $row1=mysqli_fetch_array($rs);
        $iid=$row1['regid'];
        $result=mysqli_query($con,"SELECT product1.id,product1.product_image,product1.product_name,product1.product_price,product1.shop,pay.quantity,pay.id as payment_id,pay.name,pay.address,pay.city,pay.pin_number,pay.regid,register.email from product1 join pay on product1.id=pay.product_id join register ON pay.regid=register.regid ");
                   
       ?>
        
       <table class="tableorder2" style="margin-left: 20%;">
                
                <tr>
                    <th>User Name</th>
                    <th >Product Image</th>
                    <th >Product Name</th>
                    <th >Price</th>
                    <th >Quantity</th>
                    <th >Amount</th>
                    <th >Address</th>
                    <th >Shop</th>
                    <th >Status</th>
                    
                    
                </tr>


            <tbody><?php
       
        while($row=mysqli_fetch_array($result))
        {
    ?>
    
        <tr>
        <form action="pay_for_shop.php" method="POST">
        <input type="hidden" name="payid" value="<?php echo $row["payment_id"];?> " readonly style="background-color: #d5d6d8;"class="new_txt">
        <td><input type="text" name="name" value="<?php echo $row["name"];?> " readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td><img src="product/<?php echo $row["product_image"];?>"class="pf-img_admin"></img></td>
        <td><input type="text" name="product_name" value="<?php echo $row["product_name"];?>" readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td><input type="text" name="product_price" value="<?php echo $row["product_price"];?>"readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td><input type="text" name="quantity" value="<?php echo $row["quantity"];?>"readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td style="color:red;"><input type="text" name="total" value="<?php echo $row["product_price"]*$row["quantity"];?>"readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td><input type="text" name="address" value="<?php echo $row["address"];?>
            <?php echo $row["city"];?>
            <?php echo $row["pin_number"];?>"readonly style="background-color: #d5d6d8;"class="new_txt">
        </td>
        <td> <input type="text" name="email" value="<?php echo $row["shop"];?> " readonly style="background-color: #d5d6d8;"class="new_txt"></td>
        <td style="color:green;"> <input type="submit" name="submit" class="editpd" value ="<?php echo $row['id']; ?>"></td>
        </form>
       

        </tr>
        
      
    <?php
    }
    $result3=mysqli_query($con,"SELECT `amount` FROM `pay`  ");
    $check = mysqli_num_rows($result3)>0;
    if($check){
    $total=0;
       while($row3=mysqli_fetch_array($result3))
         {
             $total +=$row3['amount'];
   
        }?>
        <?php
        }
        else
        {?>
            <div style="color:red; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:20px; margin-left:45%;margin-top:5%;">No Products Ordered Yet !!</div>
       <?php }
        
}
    ?>
                </tbody>

            </table><br><br><br><br><br><br><br><br><br><br><br><br>







</body>

</html>