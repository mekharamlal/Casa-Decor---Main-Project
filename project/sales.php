<DOCTYPE html>
    <html>
    <head>
	<title>index Page </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
            margin-top: -9%;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
                    }
        .col-6-1{
            flex: 0 0 auto;
            margin-top: -10%;
            margin-left: 35%;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        </style>
</head>
<body>
  <div class="admin_bodys">
    <div class="admin_nav">
        <ul>
            <li class="list ">
                <a href="shopindex.php">
                    <span class="icon"><ion-icon name="grid-outline"></ion-icon></span>
                    <span class="title">Dashboard</span>
                </a>
            </li>
           
            <li class="list">
                <a href="product_shop_view.php">
                    <span class="icon"><ion-icon name="pricetags-outline"></ion-icon></span>
                    <span class="title">product</span>
                </a>
            </li>
          
            <li class="list ">
                <a href="shop view.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Shop</span>
                </a>
            </li>
            <li class="list active">
                <a href="sales.php">
                    <span class="icon"><ion-icon name="server-outline"></ion-icon></span>
                    <span class="title">Sales</span>
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

        <h4 class="overview"> &nbsp;&nbsp;Sales </h4>
        <p id="dash_date"></p>
        <script>
    var today = new Date();
    var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
    document.getElementById("dash_date").innerHTML = date;
        </script>


<?php
include "db.php";
$self=$_SESSION["email"];
    $res=mysqli_query($con,"SELECT pay.id,pay.regid,pay.product_id,register.regid,register.email from pay JOIN register on pay.regid=register.regid ");
    $result=mysqli_query($con,"SELECT product1.id,product1.product_image,product1.product_name,product1.product_price,pay.quantity,pay.regid,register.email from product1 join pay on product1.id=pay.product_id join register ON pay.regid=register.regid where product1.shop='$self' ");
           
    if($result)
    {
?>
    <table class="tableorder2" style="margin-left: 25%;">
                
                <tr>
                    <th >Product Image</th>
                    <th >Product Name</th>
                    <th >Price</th>
                    <th >Quantity</th>
                    <th >Amount</th>
                    <th >Purchased User</th>
                    <th >Status</th>
                    
                    
                </tr>


            <tbody><?php
       
        while($row=mysqli_fetch_array($result))
        {
    ?>
    
        <tr>
        <td><img src="product/<?php echo $row["product_image"];?>"class="pf-img_admin"></img></td>
        <td><?php echo $row["product_name"];?></td>
        <td><?php echo $row["product_price"];?></td>
        <td><?php echo $row["quantity"];?></td>
        <td><?php echo $row["product_price"]*$row["quantity"];?></td>
        <td><?php echo $row["email"];?></td>
        <td style="color:green;">Purchased</td>
       

        </tr>
        
      
    <?php
    }
  
     }
     else
     {
         ?>
         <div style="color:red; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:20px; margin-left:45%;margin-top:5%;">No Products Ordered Yet !!</div>
    <?php }

    ?>
                </tbody>

            </table><br><br><br><br><br><br><br><br><br><br>









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