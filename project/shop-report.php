<?php
session_start();
include "db.php";
if(isset($_GET['action']) == "add"){
    $id = $_GET['id'];

    if(isset($_SESSION['mycart'][$id])){
        $previous = $_SESSION['mycart'][$id]['qty'];
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$previous+$_POST['quantity']);
    }
    else{
        $_SESSION['mycart'][$id] = array("id"=>$id,"qty"=>$_POST['quantity']);
    }
    header("location:cart1.php");

}

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
            margin-top: -20%;
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
            <h3 class="heading">CURRENT SHOPS IN CASA DECOR </h3>
            <br>
            <table class="table-bordered">
            <tr>
                    <th style="padding-left:-25px;"  >NAME</th>
                </tr>
                    <?php
                    include "db.php";
                    $sql = "SELECT `email` FROM `register` WHERE `status`='shop' ";
                    $result1 = mysqli_query($con, $sql) or die ("Query error!");
                    foreach($result1 as $a) {
                        echo "<tr>
                        <td style=padding-left:25px; >".$a['email']."</td>
                        </tr><br>";
                       
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