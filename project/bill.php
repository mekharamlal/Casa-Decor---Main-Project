<?php
session_start();
include "db.php";
if($_SESSION["email"])
            {
                $id=$_SESSION["email"];


                












?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CASA DECOR</title>
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
        .prnt{
            display: inline-block;
	        border-radius: 20px;
	        border: 1px solid #4B5251;
	        color: #4B5251;
	        text-align: center;
	        font-size: 18px;
	        padding: 5px;
	        width: 14%;
	        height: 6%;
	        transition: all 0.5s;
	        cursor: pointer;
	        margin-left: 85%;
	        margin-top:-5% ; 
        }
        .prnt:hover{
            background-color: black;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h1 class="text-white">CASA DECOR</h1>
                </div>
                <div class="col-6">
                    <div class="company-details">
                        <p class="text-white">casadecor@gmail.com</p>
                        <p class="text-white">Casa Decor</p>
                        <p class="text-white">+91 9074139799</p>
                    </div>
                </div>
                <a href="login.php" class="buttonpur" style="vertical-align:middle"><span class="spanpur">Go Back</span></a>
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">
                    
                    <h2 class="heading">Invoice No : 001</h2>
                   <?php
$rs1=mysqli_query($con,"SELECT regid from register where email='$id'");
$row5=mysqli_fetch_array($rs1);
$iidd=$row5['regid'];
$result=mysqli_query($con,"SELECT pay.regid,pay.product_name,pay.quantity,pay.amount,pay.tracking_id,pay.purchased_date,pay.name,pay.phone_number,pay.address ,pay.city,pay.pin_number,product1.id, product1.product_price from pay join product1 
on pay.product_id=product1.id and pay.regid='$iidd'");
$row3=mysqli_fetch_array($result);

echo "


<b>Name : </b>$row3[name]<br>
<b>Address : </b>$row3[address]
<br>$row3[city]
<br>$row3[pin_number]
<br><b>Phone Number : </b>$row3[phone_number]
"
;





?>
                    
                    <p class="sub-heading">Email Address: 
                    <?php 
              
              if($_SESSION["email"])
              $ch=$_SESSION["email"];
              echo"<p class=welcome>". $_SESSION["email"]."</p>"; ?>
                    </p>
                </div> 
                
            </div>
        </div>
        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
            <tr>
                    <th style="padding-left:-25px;"  >Product</th>
                    <th style="padding-left:7px;" >Quantity</th>
                    <th style="padding-left:20px;">Price</th>
                    <th style="padding-left:20px;">Grand Total</th>
                </tr>


            <tbody>
            <?php
            $new_amt =0;
            
                $rs=mysqli_query($con,"SELECT regid from register where email='$id'");
                $row1=mysqli_fetch_array($rs);
                $iid=$row1['regid'];
                $result=mysqli_query($con,"SELECT pay.regid,pay.product_name,pay.quantity,pay.amount,pay.tracking_id,pay.purchased_date,pay.name,pay.phone_number,pay.address ,pay.city,pay.pin_number,product1.id, product1.product_price from pay join product1 
                on pay.product_id=product1.id and pay.regid='$iid'");
                while($row=mysqli_fetch_array($result))
                {
                echo "<tr>
                
                <td style=padding-left:25px; >".$row['product_name']."</td>
                <td style=padding-left:25px; name=quantity>".$row['quantity']."</td>
                <td style=padding-left:25px; name=prd_price>".$row['product_price']."</td>
                <td name=qty_and_price>".(int)$row['quantity']*(int)$row['product_price']."</td>
                </tr><br>";
                
            }
            
       
            $new_amt=$_SESSION['tp2']+$_SESSION['tp'];
        echo"<tr>
        <td></td><td></td>
        <td><b> Sub Total </td>
        <td name=total> $_SESSION[tp]</td></b></tr>";
        echo"<tr>
        <td></td>
        <td></td>
        <td><b>Tax</b></td>
        <td>$_SESSION[tp2]</td>
        </tr>";
        $grand_total=$new_amt;
        echo"<tr>
        <td></td><td></td>
        <td><b> Grand Total </td>
        <td name=g_total> $grand_total</td></b></tr>";
    }
      ?>     
            </table>
            <br>
            <h3 class="heading" style="margin-left:5%;">Payment Status: Paid</h3>
            <h3 class="heading"style="margin-left:2%;">Payment Mode: Online Payment</h3>
           <div id="print_section">
            
            </div>
            <input type="button" name="submit" class="prnt"onclick="printbill('print_section')" value="Download">
            
        </div>
  

        <div class="body-section">
            <p>&copy; Copyright 2022 - CASA DECOR. All rights reserved. 
                <i style="margin-left:50%;">Thank You for Visiting...</i>
            </p>
        </div>      
    </div>      
<script>
    function printbill(section_id){
    window.print();
    }
    
</script>

</body>
</html>