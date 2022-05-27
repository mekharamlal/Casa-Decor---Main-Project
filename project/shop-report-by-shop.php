<?php
session_start();

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
            margin-top: 1%;
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
            margin-top: -11%;
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
	        margin-top:5% ; 
        }
        .prnt:hover{
            background-color: black;
        }
        .pf-img_admin{
	margin-top: 12%;
	border-radius: 50%;
	height: 100px;
	width: 100px;
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
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-6">

                    <p class="sub-heading" id="dash_date"> Date: </p>
                        <script>
                        var today = new Date();
                        var date = today.getDate()+'-'+(today.getMonth()+1)+'-'+today.getFullYear();
                        document.getElementById("dash_date").innerHTML = " Date of report generation : "+date;
                        </script>
                    
                     
                    <?php 
              if($_SESSION["email"])
              $ch=$_SESSION["email"];
             echo" <p class=sub-heading>";
              echo"<p class=welcome> "."Email Address : ". $_SESSION["email"]."</p>"; ?>
                    </p>
                </div> 
                
            </div>
        </div>
        <div class="body-section">
            <h3 class="heading"><CENTER>Current Product in  <?php echo " $_SESSION[email]";?> </h3>
            <br>
            <table class="table-bordered">
            <tr>
                    <th style="padding-left:-25px;" > Id</th> 
                    <th style="padding-left:-25px;" >Product Name</th> 
                    <th style="padding-left:-25px;" >Product Price</th>
                    <th style="padding-left:-25px;" >Product Quantity</th>
                    <th style="padding-left:-25px;" >Product Image</th>
                  
                    
                </tr>
                <?php
                    include "db.php";
                    $_SESSION["email"];
                    $result2=mysqli_query($con,"SELECT `id`, `product_name`, `product_price`, `product_quantity`, `product_image` FROM `product1` WHERE `shop`='$_SESSION[email]'");
                     while($row=mysqli_fetch_array($result2))
                    {
                        ?>

                    <tr>
                        <td><center><?php echo $row["id"];?></td>   
                        <td><?php echo $row["product_name"];?></td>
                        <td><?php echo $row["product_price"];?></td>
                        <td><?php echo $row["product_quantity"];?></td>
                        <td><img src="product/<?php echo $row["product_image"];?>"class="pf-img_admin"></img></td>
                   
                       
                    </tr>
                <?php
                    }
                    ?>
            <tbody>
     
            </table>
            <br>
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